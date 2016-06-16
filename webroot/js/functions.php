<script>
    function fetch_select(name,value)
    {
        $.ajax({
            type: 'post',
            url: 'ajax_search_functions.php',
            data: {
                name, value
            },
            success: function (response) {
                document.getElementById(name).innerHTML=response;
            }
        });
    }
</script>


