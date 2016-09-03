<script type="text/javascript">
    type = ['','info','success','warning','danger'];

    notification = {
        initPickColor: function(){
            $('.pick-class-label').click(function(){
                var new_class = $(this).attr('new-class');  
                var old_class = $('#display-buttons').attr('data-class');
                var display_div = $('#display-buttons');
                if(display_div.length) {
                var display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
                }
            });
        },
    
        initChartist: function(){
      
        },
    }
    $(document).ready(function(){
        var errorLength = "<?php $errors.length ?>";
        var errors[] = "<?php $errors ?>";

        $.notify({
            icon: 'pe-7s-attention',
            message: "errorLength"

        },{
            type: 'warning',
            timer: 4000
        });

    });

    </script>