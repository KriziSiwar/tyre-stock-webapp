<table class="table table-striped mb-0">
    <thead>
        <tr>
            <th>Date</th>
            <th>Action</th>
            <th>Pneu (ID)</th>
            <th>Véhicule</th>
            <th>Utilisateur</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
        @forelse($movements as $move)
            <tr>
                <td>{{ $move->date }}</td>
                <td>{{ $move->action }}</td>
                <td>{{ $move->tyre ? $move->tyre->id : '' }}</td>
                <td>{{ $move->tyre && $move->tyre->vehicle ? $move->tyre->vehicle->chassis_number : '' }}</td>
                <td>{{ $move->user ? $move->user->name : '' }}</td>
                <td>{{ $move->notes }}</td>
            </tr>
        @empty
            <tr><td colspan="6">Aucun mouvement trouvé.</td></tr>
        @endforelse
    </tbody>
</table> 