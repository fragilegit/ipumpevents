@section('script')
<script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
        $('#name').on('blur', function(){
            
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