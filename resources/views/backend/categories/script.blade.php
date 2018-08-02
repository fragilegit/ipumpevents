@section('script')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script src="{{ asset('/backend/plugins/simple-mde/simplemde.min.js') }}"></script>
<script src="{{ asset('/backend/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
        $('#title').on('blur', function(){
            
            var eventName = this.value.toLowerCase().trim(),
                slugInput = $('#slug');
                theSlug = eventName.replace(/&/g,'-and-')
                                   .replace(/[^a-z0-9-]+/g,'-')
                                   .replace(/\-\-+/g,'-')
                                   .replace(/^-+|-+$/g,'-')
                                
                slugInput.val(theSlug);
        });
    </script>
@endsection