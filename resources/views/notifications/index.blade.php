@extends('layouts.adminlte-app')

@section('title', 'Notifications')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
    <h3 class="mb-0">Notifications</h3>
    <button type="button" class="btn btn-secondary mb-2" id="markAllRead">
        <i class="fas fa-check-double"></i> Tout marquer comme lu
    </button>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>Type</th>
                <th>Message</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
            <tr class="{{ $notification->read_at ? '' : 'table-warning' }}">
                <td>
                    @if($notification->type === 'App\\Notifications\\LowStockNotification')
                        <i class="fas fa-exclamation-triangle text-warning"></i> Alerte Stock
                    @else
                        <i class="fas fa-info-circle text-info"></i> Information
                    @endif
                </td>
                <td>
                    @php $data = json_decode($notification->data, true); @endphp
                    {{ $data['message'] ?? 'Notification' }}
                    @if(isset($data['tyre_count']))
                        <br><small class="text-muted">Pneus: {{ $data['tyre_count'] }}</small>
                    @endif
                </td>
                <td>{{ $notification->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    @if($notification->read_at)
                        <span class="badge badge-success">Lu</span>
                    @else
                        <span class="badge badge-warning">Non lu</span>
                    @endif
                </td>
                <td>
                    @if(!$notification->read_at)
                        <button type="button" class="btn btn-sm btn-success mark-read" data-id="{{ $notification->id }}" title="Marquer comme lu">
                            <i class="fas fa-check"></i>
                        </button>
                    @endif
                    <button type="button" class="btn btn-sm btn-danger delete-notification" data-id="{{ $notification->id }}" title="Supprimer">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {{ $notifications->links() }}
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Marquer comme lu
    $('.mark-read').click(function() {
        const id = $(this).data('id');
        const row = $(this).closest('tr');
        $.post(`/notifications/${id}/read`)
            .done(function() {
                row.removeClass('table-warning');
                row.find('.badge').removeClass('badge-warning').addClass('badge-success').text('Lu');
                row.find('.mark-read').remove();
            });
    });
    // Marquer tout comme lu
    $('#markAllRead').click(function() {
        $.post('/notifications/read-all')
            .done(function() {
                location.reload();
            });
    });
    // Supprimer notification
    $('.delete-notification').click(function() {
        const id = $(this).data('id');
        const row = $(this).closest('tr');
        if (confirm('Êtes-vous sûr de vouloir supprimer cette notification ?')) {
            $.ajax({
                url: `/notifications/${id}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function() {
                row.fadeOut();
            });
        }
    });
});
</script>
@endpush 