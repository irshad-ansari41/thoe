<table class="table table-responsive" id="amenities-table">
    <thead>
     <tr>
        <th>Name</th>
        <th>Slug</th>
        <th>Status</th>
        <th colspan="3">Action</th>
     </tr>
    </thead>
    <tbody>
    @foreach($amenities as $amenity)
        <tr>
            <td>{!! $amenity->name !!}</td>
            <td>{!! $amenity->slug !!}</td>
            <td>{!! $amenity->status !!}</td>
            <td>
                 <a href="{{ route('admin.amenities.show', $amenity->id) }}">
                     <i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view amenity"></i>
                 </a>
                 <a href="{{ route('admin.amenities.edit', $amenity->id) }}">
                     <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit amenity"></i>
                 </a>
                 <a href="{{ route('admin.amenities.confirm-delete', $amenity->id) }}" data-toggle="modal" data-target="#delete_confirm">
                     <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete amenity"></i>
                 </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@section('footer_scripts')
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>
@stop