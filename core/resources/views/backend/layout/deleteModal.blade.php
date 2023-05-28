<div class="modal fade" tabindex="-1" id="delete" role="dialog">
    <div class="modal-dialog" role="document">
        <form action="" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">{{ __('Delete') }}?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are You Sure to Delete This Item') }}?
                        {{ __('Once Delete Data Store In Trash For 30days.') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">{{ __('Safe Data') }}</button>

                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
