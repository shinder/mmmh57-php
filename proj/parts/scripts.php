<script src="../js/jquery-3.4.1.js"></script>
<script src="../bootstrap/js/bootstrap.bundle.js"></script>
<script>
    $.get('add-to-cart-api.php', function(data){
        countCartObj(data);
    }, 'json');

    function countCartObj(data){
        let total = 0;
        for(let i in data){
            total += data[i];
        }
        $('.cart-count').text(total);
    }
</script>