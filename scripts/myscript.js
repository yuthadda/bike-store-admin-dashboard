$(document).ready(function(){

    $(document).on('click','.btnDelete',function(){
        let btnDelete = $(this);
        // console.log(btnDelete);

        let tr=btnDelete.parent().parent();
        // console.log(tr);
        let id=tr.attr('id');
        console.log(id);
        let status = confirm("Are you sure to delete??");
        if(status){
            $.ajax(
                {
                    url:'delete-brandajax.php',
                    method:'post',
                    data:{id:id},
                    success:function(response){
                        // alert(response);
                        let result = JSON.parse(response);
                        if(result.status=='true'){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $(document).on('click','.btnDeleteCtg',function(){
        let btnDeleteCtg = $(this);
        // console.log(btnDelete);

        let tr=btnDeleteCtg.parent().parent();
        // console.log(tr);
        let id=tr.attr('id');
        // console.log(id);
        let status = confirm("Are you sure to delete??");
        if(status){
            $.ajax(
                {
                    url:'delete-categoryajax.php',
                    method:'post',
                    data:{id:id},
                    success:function(response){
                        // alert(response);
                        let result = JSON.parse(response);
                        if(result.status=='true'){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $(document).on('click','.btnDeleteProduct',function(){
        let btnDeleteProduct = $(this);
        // console.log(btnDelete);

        let tr=btnDeleteProduct.parent().parent();
        // console.log(tr);
        let id=tr.attr('id');
        // console.log(id);
        let status = confirm("Are you sure to delete??");
        if(status){
            $.ajax(
                {
                    url:'delete-productajax.php',
                    method:'post',
                    data:{id:id},
                    success:function(response){
                        // alert(response);
                        let result = JSON.parse(response);
                        if(result.status=='true'){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $(document).on('click','.btnDeleteCustomer',function(){
        let btnDeleteCustomer = $(this);
        // console.log(btnDelete);

        let tr=btnDeleteCustomer.parent().parent();
        // console.log(tr);
        let id=tr.attr('id');
        // console.log(id);
        let status = confirm("Are you sure to delete??");
        if(status){
            $.ajax(
                {
                    url:'delete-customerajax.php',
                    method:'post',
                    data:{id:id},
                    success:function(response){
                        // alert(response);
                        let result = JSON.parse(response);
                        if(result.status=='true'){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $('.btnSearch').click(function(){
        let data = $('.search').val();
        // console.log(data);
        let tbody = $('#tbody');
        console.log(hi);
        if(data.length>0){
            $.ajax(
                {
                    url:'search-brand.php',
                    method:'post',
                    data:{value:data},
                    success:function(response){
                        tbody.children().remove();
                        tbody.append(response);
                    }
                }
            )
        }else{
            alert("Please enter data to search");
        }
    })

    $('.btnSearchProduct').click(function(){
        let data = $('.search').val();
        console.log(data);
        let tbody = $('#tbody');
        if(data.length > 0){
            $.ajax(
                {
                    url:'search-product.php',
                    method:'post',
                    data: {value:data},
                    success:function(response){
                        tbody.children().remove();
                        tbody.append(response);
                    }
                }
            )
        }
    })

    $('.btnSearchCategory').click(function(){
        let data = $('.search').val();
        console.log(data);
        let tbody = $('#tbody');
        if(data.length > 0){
            $.ajax(
                {
                    url:'search-category.php',
                    method:'post',
                    data: {value:data},
                    success:function(response){
                        tbody.children().remove();
                        tbody.append(response);
                    }
                }
            )
        }
    })

    $('.btnSearchCustomer').click(function(){
        let data = $('.search').val();
        console.log(data);
        let tbody = $('#tbody');
        console.log(tbody);
        if(data.length > 0){
            $.ajax(
                {
                    url:'search-customer.php',
                    method:'post',
                    data: {value:data},
                    success:function(response){
                        tbody.children().remove();
                        tbody.append(response);
                    }
                }
            )
        }
    })


    $(document).on('click','.btnStoreDelete',function(){
        let btnStoreDelete = $(this);


        let tr=btnStoreDelete.parent().parent();
        // console.log(tr);
        let id=tr.attr('id');

        let status = confirm("Are you sure to delete??");
        if(status){
            $.ajax(
                {
                    url:'delete-store.php',
                    method:'post',
                    data:{id:id},
                    success:function(response){
                        // alert(response);
                        let result = JSON.parse(response);
                        if(result.status=='true'){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $('.btnStoreSearch').click(function(){
        let data = $('.storeSearch').val();
        console.log(data);
        let tbody = $('#tbody');
        console.log(tbody);
        if(data.length > 0){
            $.ajax(
                {
                    url:'searchStore.php',
                    method:'post',
                    data: {value:data},
                    success:function(response){
                        tbody.children().remove();
                        tbody.append(response);
                    }
                }
            )
        }
    })



})





