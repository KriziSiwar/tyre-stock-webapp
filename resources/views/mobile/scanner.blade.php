<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanner QR - Gestion Pneus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .scanner-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        .qr-video {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .result-card {
            display: none;
            margin-top: 20px;
        }
        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }
        .manual-input {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="scanner-container">
        <div class="text-center mb-4">
            <h2><i class="fas fa-qrcode"></i> Scanner QR</h2>
            <p class="text-muted">Scannez le QR code d'un pneu pour voir ses informations</p>
        </div>

        <!-- Scanner QR -->
        <div class="card">
            <div class="card-body">
                <video id="qr-video" class="qr-video"></video>
                <div class="text-center mt-3">
                    <button id="start-scanner" class="btn btn-primary">
                        <i class="fas fa-play"></i> Démarrer le scanner
                    </button>
                    <button id="stop-scanner" class="btn btn-secondary" style="display: none;">
                        <i class="fas fa-stop"></i> Arrêter le scanner
                    </button>
                </div>
            </div>
        </div>

        <!-- Saisie manuelle -->
        <div class="manual-input">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Saisie manuelle</h5>
                    <div class="input-group">
                        <input type="text" id="manual-qr" class="form-control" placeholder="Entrez le code QR manuellement">
                        <button class="btn btn-outline-primary" id="search-manual">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Loading -->
        <div class="loading">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Chargement...</span>
            </div>
            <p class="mt-2">Recherche en cours...</p>
        </div>

        <!-- Résultat -->
        <div class="result-card card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-tire"></i> Informations du Pneu
                </h5>
            </div>
            <div class="card-body">
                <div id="tyre-info">
                    <!-- Les informations du pneu seront affichées ici -->
                </div>
            </div>
        </div>

        <!-- Erreur -->
        <div class="alert alert-danger mt-3" id="error-message" style="display: none;">
            <i class="fas fa-exclamation-triangle"></i>
            <span id="error-text"></span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script>
        let video = document.getElementById('qr-video');
        let canvas = document.createElement('canvas');
        let context = canvas.getContext('2d');
        let scanning = false;

        // Démarrer le scanner
        document.getElementById('start-scanner').addEventListener('click', startScanner);
        document.getElementById('stop-scanner').addEventListener('click', stopScanner);
        document.getElementById('search-manual').addEventListener('click', searchManual);

        async function startScanner() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
                video.srcObject = stream;
                video.play();
                
                document.getElementById('start-scanner').style.display = 'none';
                document.getElementById('stop-scanner').style.display = 'inline-block';
                
                scanning = true;
                scanQR();
            } catch (error) {
                showError('Impossible d\'accéder à la caméra: ' + error.message);
            }
        }

        function stopScanner() {
            if (video.srcObject) {
                video.srcObject.getTracks().forEach(track => track.stop());
            }
            
            document.getElementById('start-scanner').style.display = 'inline-block';
            document.getElementById('stop-scanner').style.display = 'none';
            
            scanning = false;
        }

        function scanQR() {
            if (!scanning) return;

            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                canvas.height = video.videoHeight;
                canvas.width = video.videoWidth;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                
                const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                const code = jsQR(imageData.data, imageData.width, imageData.height);
                
                if (code) {
                    stopScanner();
                    searchTyre(code.data);
                }
            }
            
            requestAnimationFrame(scanQR);
        }

        function searchManual() {
            const qrCode = document.getElementById('manual-qr').value.trim();
            if (qrCode) {
                searchTyre(qrCode);
            } else {
                showError('Veuillez entrer un code QR');
            }
        }

        function searchTyre(qrCode) {
            showLoading(true);
            hideError();
            
            fetch(`/api/tyres/qr/${qrCode}`)
                .then(response => response.json())
                .then(data => {
                    showLoading(false);
                    if (data.success) {
                        displayTyreInfo(data.data);
                    } else {
                        showError(data.message || 'Pneu non trouvé');
                    }
                })
                .catch(error => {
                    showLoading(false);
                    showError('Erreur lors de la recherche: ' + error.message);
                });
        }

        function displayTyreInfo(tyre) {
            const infoDiv = document.getElementById('tyre-info');
            const resultCard = document.querySelector('.result-card');
            
            infoDiv.innerHTML = `
                <div class="row">
                    <div class="col-6">
                        <strong>ID:</strong><br>
                        <strong>Dimension:</strong><br>
                        <strong>Type:</strong><br>
                        <strong>Usure:</strong><br>
                        <strong>Saison:</strong><br>
                        <strong>Statut:</strong>
                    </div>
                    <div class="col-6">
                        #${tyre.id}<br>
                        ${tyre.dimension}<br>
                        ${tyre.type}<br>
                        ${tyre.wear}<br>
                        ${tyre.season}<br>
                        <span class="badge ${tyre.removed_at ? 'bg-danger' : 'bg-success'}">
                            ${tyre.removed_at ? 'Retiré' : 'En Stock'}
                        </span>
                    </div>
                </div>
                
                ${tyre.vehicle ? `
                <hr>
                <h6><i class="fas fa-car"></i> Véhicule</h6>
                <div class="row">
                    <div class="col-6">
                        <strong>Marque:</strong><br>
                        <strong>Modèle:</strong><br>
                        <strong>Chassis:</strong>
                    </div>
                    <div class="col-6">
                        ${tyre.vehicle.marque}<br>
                        ${tyre.vehicle.modele}<br>
                        ${tyre.vehicle.chassis_number}
                    </div>
                </div>
                ` : ''}
                
                ${tyre.locker ? `
                <hr>
                <h6><i class="fas fa-door-closed"></i> Casier</h6>
                <div class="row">
                    <div class="col-6">
                        <strong>Code:</strong><br>
                        <strong>Localisation:</strong>
                    </div>
                    <div class="col-6">
                        ${tyre.locker.code}<br>
                        ${tyre.locker.location}
                    </div>
                </div>
                ` : ''}
            `;
            
            resultCard.style.display = 'block';
            resultCard.scrollIntoView({ behavior: 'smooth' });
        }

        function showLoading(show) {
            document.querySelector('.loading').style.display = show ? 'block' : 'none';
        }

        function showError(message) {
            document.getElementById('error-text').textContent = message;
            document.getElementById('error-message').style.display = 'block';
        }

        function hideError() {
            document.getElementById('error-message').style.display = 'none';
        }
    </script>
</body>
</html> 