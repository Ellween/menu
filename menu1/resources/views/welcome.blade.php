<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Nestable</title>

<style type="text/css">
    .dd { 
        position: relative; 
        display: block; 
        margin: 0; 
        padding: 0; 
        max-width: 600px; 
        list-style: none; 
        font-size: 13px; 
        line-height: 20px;
    }
    .dd-item, .dd-empty, .dd-placeholder { 
        display: block; 
        position: relative; 
        margin: 0; 
        padding: 0; 
        min-height: 20px; 
        font-size: 13px; 
        line-height: 20px;
    }
    .dd-handle { 
        display: block; 
        height: 30px; 
        margin: 5px 0; 
        padding: 5px 10px; 
        color: #333; 
        text-decoration: none; 
        font-weight: bold; 
        border: 1px solid #ccc;
        background: #fafafa;
        background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
        background: linear-gradient(top, #fafafa 0%, #eee 100%);
        -webkit-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box; -moz-box-sizing: border-box;
    }

    .dd-item > button { 
        display: block; 
        position: relative; 
        cursor: pointer; 
        float: left; 
        width: 25px; 
        height: 20px; 
        margin: 5px 0; 
        padding: 0; 
        text-indent: 100%; 
        white-space: nowrap; 
        overflow: hidden; 
        border: 0; 
        background: transparent; 
        font-size: 12px; 
        line-height: 1; 
        text-align: center; 
        font-weight: bold;
    }

    .dd-item > button:before {
        content: '+'; 
        display: block; 
        position: absolute; 
        width: 100%; 
        text-align: center; 
        text-indent: 0;
    }

    .dd-item > button[data-action="collapse"]:before { 
        content: '-';
    }

    .dd-placeholder, .dd-empty { 
        margin: 5px 0; 
        padding: 0; 
        min-height: 30px; 
        background: #f2fbff; 
        border: 1px dashed #b6bcbf; 
        box-sizing: border-box; 
        -moz-box-sizing: border-box;
    }

    .dd-empty {
        border: 1px dashed #bbb; 
        min-height: 100px; 
        background-color: #e5e5e5;
        background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                        -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                                linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
        background-size: 60px 60px;
        background-position: 0 0, 30px 30px;
    }

    .dd-dragel { 
        position: absolute; 
        pointer-events: none; 
        z-index: 9999;
    }

</style>
</head>
<body>


    
    <div class="dd" id="nestable">
        <ol class="dd-list">
            @foreach ($menus as $menu)
            <li class="dd-item" data-id={{ $menu->id }}>
                <div class="dd-handle">{{ $menu->name }}</div>
            </li>
            @endforeach
        </ol>
    </div>



    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script src="/js/nestable.js"></script>



<script>
$(document).ready(function()
{
   
    // activate Nestable for list 1
    $('#nestable').nestable();
    

    $('.dd').on('change', function() {
        $.ajax({
            headers: {
                     'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                             },
            type:"POST",
            url:'/change',
            data: {items: $('.dd').nestable('serialize')},
    
            success: function(data){
    
               
    
                
            },
    
            error: function(data)
            {
                
            }
    
        });   
    });
 
});
</script>
</body>
</html>