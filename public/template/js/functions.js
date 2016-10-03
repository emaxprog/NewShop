$(document).ready(function () {
    $('.buy-btn').click(function () {
        var productId = parseInt($(this).attr('data-id'));
        var name = $(this).attr('data-name');
        var price = parseInt($(this).attr('data-price'));
        var img = $('#img-' + productId).attr('src');

        var order = $.cookie('basket') ? $.cookie('basket') : null;
        order ? order = JSON.parse(order) : order = [];
        if (!order.length) {
            order.push({
                'productId': productId,
                'name': name,
                'price': price,
                'img': img,
                'amount': 1
            });
        } else {
            var flag = false;
            for (var i = 0; i < order.length; i++) {
                if (order[i].productId == productId) {
                    order[i].amount++;
                    flag = true;
                    break;
                }
            }
            if (!flag) {
                order.push({
                    'productId': productId,
                    'name': name,
                    'price': price,
                    'img': img,
                    'amount': 1
                });
            }
        }
        $.cookie('basket', JSON.stringify(order));
        count_products();
    });


    $('.input-total-price').bind('change keyup', function () {
        var amount = $(this).val();
        if (!amount.match(/[0-9]+/) || amount <= 0) {
            $(this).val('1');
            amount = 1;
        }
        var productId = $(this).parent().parent().attr('data-id');
        var price = $(this).parent().prev().html();
        $(this).parent().next().html(amount * price);
        set_cookie_basket(productId, amount);
        insert_total_cost();
    });

    $('.btn-delete').click(function () {
        var tr = $(this).parent().parent();
        var productId = $(this).parent().parent().attr('data-id');
        tr.remove();
        var order = JSON.parse($.cookie('basket'));
        for (var i = 0; i < order.length; i++) {
            if (order[i].productId == productId) {
                order.splice(i, 1);
                break;
            }
        }
        $.cookie('basket', JSON.stringify(order));
        if (order.length < 1) {
            $.removeCookie('basket');
            location.reload();
        }
        count_products();
        insert_total_cost();
    });

    $('.btn-plus').click(function () {
        $(this).siblings('.input-total-price').val(parseInt($(this).siblings('.input-total-price').val()) + 1).change();
    });

    $('.btn-minus').click(function () {
        $(this).siblings('.input-total-price').val(parseInt($(this).siblings('.input-total-price').val()) - 1).change();
    });

    $('#btn-add-parameters').click(function () {
        var button = $(this);
        $.ajax({
            url: '/admin/product_attributes',
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                button.after(data);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('.delete-product').click(function () {
        var tr = $(this).parent().parent();
        var product_id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/product/' + product_id,
            type: 'DELETE',
            data: {product_id: product_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                tr.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('.delete-category').click(function () {
        var tr = $(this).parent().parent();
        var category_id = tr.attr('data-id');
        $.ajax({
            url: '/admin/category/' + category_id,
            type: 'DELETE',
            data: {category_id: category_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function () {
                tr.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('.delete-order').click(function () {
        var tr = $(this).parent().parent();
        var order_id = tr.attr('data-id');
        $.ajax({
            url: '/admin/order/' + order_id,
            type: 'DELETE',
            data: {order_id: order_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function () {
                tr.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $(document).on('click', '#btn-remove-parameter', function () {
        var block;
        if (confirm('Удалить?')) {
            block = $(this).parent();
            block.remove();
        }
    });

    $(document).on('click', '#btn-add-parameter', function () {
        $('#myModal').dialog({modal: true, height: 300, width: 500});
    });

    $(document).on('click', '#btn-close', function () {
        $('#myModal').dialog('close');
    });

    $(document).on('click', '#btn-save', function () {
        var name = $('input[name="attribute-name"]').val();
        var unit = $('input[name="unit"]').val();
        $.ajax({
            url: '/admin/product_attributes',
            type: 'POST',
            data: {name: name, unit: unit},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (param) {
                $('select[name="parameter"]').append('<option value="' + param.id + '">' + param.name + '(' + param.unit + ')</option>');
                $('#myModal').dialog('close');
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('#add-images-products').click(function () {
        var imgs = $('img');
        var images = $('input[name="images[]"]');
        if (imgs.length + images.length == 11)
            return;
        var image = $('input[name="images[]"]:first').clone();
        $(this).after(image);
        $(this).after('<br>');
    });

    $('.delete-image').click(function () {
        var div = $(this).parent();
        var img = $(this).prev();
        var src = img.attr('src');
        var product_id = img.attr('data-id');
        $.ajax({
            url: '/delete_image',
            type: 'POST',
            data: {src: src, product_id: product_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                div.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('#add-image-afisha').click(function () {
        var imgs = $('img');
        var images = $('input[name="images[]"]');
        if (imgs.length + images.length == 10)
            return;
        var image = '<input type="file" name="images[]">';
        $(this).after(image);
        $(this).after('<br>');
    });

    $('.delete-image-afisha').click(function () {
        var div = $(this).parent();
        var img = $(this).prev();
        var src = img.attr('src');
        $.ajax({
            url: '/admin/afisha/destroy',
            type: 'DELETE',
            data: {src: src},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                div.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    function total_cost() {
        var order = JSON.parse($.cookie('basket'));
        var total = 0;
        for (var i = 0; i < order.length; i++) {
            total += order[i].price * order[i].amount;
        }
        return total;
    }

    function insert_total_cost() {
        $('.total-cost').html('<span>Общая стоимость: ' + total_cost() + ' руб.</span>');
    }

    function set_cookie_basket(productId, amount) {
        var order = JSON.parse($.cookie('basket'));
        for (var i = 0; i < order.length; i++) {
            if (order[i].productId == productId) {
                order[i].amount = amount;
                break;
            }
        }
        $.cookie('basket', JSON.stringify(order));
        count_products();
    }

    function count_products() {
        var order = $.cookie('basket');
        order = JSON.parse(order);
        var count = 0;
        for (var i = 0; i < order.length; i++) {
            count += parseInt(order[i].amount);
        }
        $('.count-products').html(count);
    }

    insert_total_cost();
    count_products();
})
;