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
      
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        function viewData(){
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/dashboard/users",
                success: function(response){
                    alert('hey');
                    var rows = "";
                    console.log(response.data);
                    $.each(response.data, function(key,value){
                        rows = rows + "<tr>";
                        rows = rows + "<td>"+ value.name +"</td>";
                        rows = rows + "</tr>";
                    });
                    $(tbody[1]).html(rows);
                }
            })
        }
          

        function saveData(){

        }

        function clearData(){

        }

        function editData(){

        }

        function deleteData(id){

        }

        $(document).ready(function(){
            $('tbody').html("heyyy");
            viewData();
        });
    </script>
@endsection