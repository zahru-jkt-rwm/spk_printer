
    $(document).ready(function(){
        $('#selectTroubel').change(function(){
            $('#detilTrouble').show();
            var id=$(this).val();
            $.ajax({
                url : "detailtrouble",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_kerusakan+'">['+data[i].id_kerusakan+']'+data[i].kerusakan+'</option>';
                    }
                    $('#detilKerusakan').html(html);
                     
                }
            });
        });
        $('#detilKerusakan').change(function(){
            $('#actionDiagnosa').show();
        });
    });
