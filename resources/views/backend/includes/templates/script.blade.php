<script type="text/javascript">

    var list = document.getElementById("content-list");

    Sortable.create(list, {

        onUpdate: function () {

            swalLoader();

            data = [];

            $('#content-list li').each(function(index) {

                data.push([$(this).data('id'), index]);

            });

            $.ajax({
                url: "{{ route('webapi.admin.template.sort') }}",
                data: {data:data},
                success: function(data){ /*location.reload();*/ swal.close(); }
            });
        }

    });

    var ajaxFunction = function(el){

        if(el.data('type') == 'add-template'){

            data = {
                model_name: "{{ class_basename($model) }}",
                model_id: "{{ $model->id }}",
                selected_template: $('#selected-template').val()
            };

            $.ajax({
                
                url: "{{ route('webapi.admin.template.add') }}",

                data: data,
                
                success: function(){ 
                
                    location.reload();

                }

            });

        }else if(el.data('type') == 'section-content'){

            $('#template-form').submit();

        }else if (el.data('type') == 'delete-template') {

            id = el.attr('data-id');

            $.ajax({
                
                url: "{{ route('webapi.admin.template.delete') }}",

                data: {id:id},
                
                success: function(){ 
                
                    location.reload();

                }

            });
            
        }else if(el.data('type') == 'delete-text-column'){

            if(el.attr('data-save') == 'false'){

                $('.text-column-' + el.attr('data-id')).remove();
                
                swal.close();

                return false;

            }

            $.ajax({

                url: el.attr('href'),
                
                success: function () {
                
                    location.reload()
                
                }

           });

        }

    }

</script>