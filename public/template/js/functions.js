$(document).ready(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $('.buy-btn').click(function () {
        var productId = parseInt($(this).attr('data-id'));
        var name = $(this).attr('data-name');
        var price = parseInt($(this).attr('data-price'));
        var img = $('#img-' + productId).attr('src');
        if (img == undefined)
            img = $('img[data-u="image"]:first').attr('src');

        var order = $.cookie('basket') ? $.cookie('basket') : null;
        order = order != null ? JSON.parse(order) : [];
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
        $.cookie('basket', JSON.stringify(order), {path: '/'});
        count_products();
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

    $('.input-total-price').bind('change keyup', function () {
        var inputTotalPrice = $(this);
        var productId = $(this).attr('data-id');

        $.ajax({
            url: '/product/' + productId + '/amount',
            type: 'GET',
            success: function (data) {
                var uploadAmount = parseInt(data);
                if (uploadAmount <= inputTotalPrice.val()) {
                    inputTotalPrice.val(parseInt(uploadAmount));
                    inputTotalPrice.tooltip({
                        title: "Максимально доступное количество товара! К сожалению данный товар доступен в текущем количестве"
                    }).tooltip('show');
                }
                else {
                    inputTotalPrice.tooltip('destroy');
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        }).always(function () {
            var amount = inputTotalPrice.val();
            if (amount.match(/\D/) || amount <= 0) {
                inputTotalPrice.val('1');
                amount = 1;
            }
            var price = inputTotalPrice.attr('data-price');
            var tdTotalPrice = $('tr[data-id="' + productId + '"]').children('.total-price');
            tdTotalPrice.html(amount * price + " руб.");
            set_cookie_basket(productId, amount);
            insert_total_cost();
        });
    });

    $('.btn-plus').click(function () {
        var productId = $(this).attr('data-id');
        var inputTotalPrice = $('input[data-id="' + productId + '"]');
        inputTotalPrice.val(parseInt(inputTotalPrice.val()) + 1).change();
    });


    $('.btn-minus').click(function () {
        var productId = $(this).attr('data-id');
        var inputTotalPrice = $('input[data-id="' + productId + '"]');
        inputTotalPrice.val(parseInt(inputTotalPrice.val()) - 1).change();
    });


    /*Управление категориями*/

    $('.delete-category').click(function () {
        var category_id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + category_id + '"]');
        if (confirm('Вы действительно хотите удалить данную категорию?')) {
            $.ajax({
                url: '/admin/category/' + category_id,
                type: 'DELETE',
                success: function () {
                    tr.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    /*Управление заказами*/

    $('.delete-order').click(function () {
        var order_id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + order_id + '"]');
        if (confirm('Вы действительно хотите удалить данный заказ?')) {
            $.ajax({
                url: '/admin/order/' + order_id,
                type: 'DELETE',
                success: function () {
                    tr.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    /*Управление продуктами*/


    $(document).on('click', '.delete-product', function () {
        var product_id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + product_id + '"]');
        if (confirm('Вы действительно хотите удалить данный продукт?')) {
            $.ajax({
                url: '/admin/product/' + product_id,
                type: 'DELETE',
                data: {product_id: product_id},
                success: function () {
                    tr.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    $('#btn-add-parameters').click(function () {
        var button = $(this);
        $.ajax({
            url: '/admin/product_attributes',
            type: 'GET',
            success: function (data) {
                button.after(data);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });


    $(document).on('click', '.btn-remove-parameter', function () {
        var block = $(this).parent();
        var productId = $(this).attr('data-product-id');
        var attributeId = $(this).attr('data-attribute-id');
        if (!productId) {
            block.remove();
            return;
        }
        if (confirm('Удалить?')) {
            $.ajax({
                url: '/admin/product/' + productId + '/pav',
                type: 'DELETE',
                data: {attributeId: attributeId},
                success: function (data) {
                    block.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });


    $(document).on('click', '.btn-add-parameter', function () {
        $('#modal-add-attribute').modal();
    });

    $(document).on('click', '.btn-remove-attribute', function () {
        $('#modal-delete-attribute').modal();
    });

    $(document).on('click', '#btn-da-close', function () {
        $('#modal-delete-attribute').modal('close');
    });

    $(document).on('click', '#btn-save', function () {
        var name = $('input[name="attribute-name"]').val();
        var unit = $('input[name="unit"]').val();
        $.ajax({
            url: '/admin/product_attributes',
            type: 'POST',
            data: {name: name, unit: unit},
            success: function (param) {
                $('select[name="parameters[]"]').append('<option value="' + param.id + '">' + param.name + '(' + param.unit + ')</option>');
                $('.table-attributes').append('<tr><td>' + param.name + '</td> <td data-id="' + param.id + '" class="delete-attribute"><i class="fa fa-trash fa-lg"></i></td></tr>');
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $(document).on('click', '.delete-attribute', function () {
        var tr = $(this).parent();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/admin/product_attributes/' + id,
            type: 'DELETE',
            success: function (data) {
                tr.remove();
                $('option[value="' + data + '"]').remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });


    $('.add-images-products').click(function () {
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
            url: '/admin/product/' + product_id + '/image',
            type: 'DELETE',
            data: {src: src},
            success: function (data) {
                div.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });


    /*Управление афишей*/

    $('#add-image-afisha').click(function () {
        var imgs = $('img');
        var images = $('input[name="images[]"]');
        if (imgs.length + images.length == 10)
            return;
        var image = '<input type="file" name="images[]" accept="image/*">';
        $(this).after(image);
        $(this).after('<br>');
    });

    $('.delete-image-afisha').click(function () {
        var div = $(this).parent();
        var img = $(this).prev();
        var src = img.attr('src');
        $.ajax({
            url: '/admin/afisha',
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

    /*Подгрузка регионов*/
    $('select#country').change(function () {
        var countryId = $(this).val();
        var selectRegion = $('select#region');
        $.ajax({
            url: '/user/regions/' + countryId,
            type: 'GET',
            success: function (data) {
                selectRegion.html(data);
                selectRegion.trigger('change');
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    /*Подгрузка городов*/
    $('select#region').change(function () {
        var regionId = $(this).val();
        var selectCity = $('select#city');
        $.ajax({
            url: '/user/cities/' + regionId,
            type: 'GET',
            success: function (data) {
                selectCity.html(data);
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
        $('.baskets-counter').html(count);
    }

    function uploadProducts() {
        var progress = false;
        var startFrom = 0;
        var table = $('#table-products-ajax');
        $('button#btn-more').click(function () {
            $.ajax({
                url: '/admin/product/upload/' + startFrom,
                type: 'GET',
                beforeSend: function () {
                    progress = true;
                },
                success: function (data) {
                    table.append(data);
                    progress = false;
                    startFrom += 5;
                }
            });
        });
        $('button#btn-more').trigger('click');
    }

    uploadProducts();
    insert_total_cost();
    count_products();
});