 <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
     
<script type="text/javascript">

    trainsAller();
    function trainsAller(){
        var form_data = {
            block  : 'trainsAller'
        };
        $.ajax({
            async : false,
            type: 'POST',
            url: "<?=site_url('ajax');?>",
            data: form_data,
            dataType : 'json',
            success: function(html){
                $(".trainsAller").html(html);
            }
        });  
    }
    setInterval(trainsAller, 30000);
    
    trainsRetour();
    function trainsRetour(){
        var form_data = {
            block  : 'trainsRetour'
        };
        $.ajax({
            async : false,
            type: 'POST',
            url: "<?=site_url('ajax');?>",
            data: form_data,
            dataType : 'json',
            success: function(html){
                $(".trainsRetour").html(html);
            }
        });  
    }
    setInterval(trainsRetour, 30000);
    
    
</script>

