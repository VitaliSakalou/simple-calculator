<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="./styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-8">
                <form action='' method = 'post'>
                    <input class="col-12 form-control-lg bg-light" id = "inputValue" type = "text" name="name"  readonly value = 0 >
                </form>
            </div>
        </div>
        <div class="row m-1 justify-content-md-center">
            <div class="col-12 col-md-8 mt-2 keys">
                <div class = "row">
                    <?php $arr = array_fill(1, 3, true);
                        foreach ($arr as $key=>$value): ?>
                            <button type="button" class="btn col  btn-outline-dark key" value = <?= $key?> >
                                <?= $key?>
                            </button>
                        <?php endforeach ?>
                        <button type="button" class="btn col  btn-outline-dark key" value = '+' >+</button>
                </div>
                <div class="row">
                    <?php $arr = array_fill(4, 3, true);
                        foreach ($arr as $key=>$value): ?>
                            <button type="button" class="btn col btn-outline-dark key" value = <?= $key?> >
                                <?= $key?>
                            </button>
                        <?php endforeach ?>
                        <button type="button" class="btn col btn-outline-dark key" value = '-' >-</button>
                </div>
                <div class="row">
                    <?php $arr = array_fill(7, 3, true);
                        foreach ($arr as $key=>$value): ?>
                            <button type="button" class="btn col btn-outline-dark key" value = <?= $key?> >
                                <?= $key?>
                            </button>
                        <?php endforeach ?>
                        <button type="button" class="btn col btn-outline-dark key" value = '*' >*</button>
                </div>
                <div class="row">
                    <button id = "resetButton" type="button" class="btn col btn-outline-dark" value = "C" >C</button>
                    <button type="button" class="btn col btn-outline-dark key" value = "0" >0</button>
                    <button id = "countButton" type="button" class="btn col btn-outline-dark" value = "=" >=</button>
                    <button type="button" class="btn col btn-outline-dark key" value = "/" >/</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type='text/javascript' src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
