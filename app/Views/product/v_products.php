<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = "content">
        <div class = "container">
            <div class = "row">
                <?php foreach ($items as $key => $value){?>
                    
                <div class="col-lg-3">
                    <div class = "card">
                        <div class = "card-body">
                            <h5 class="card-title">card title</h5>

                            <p class = "card-text">
                                ini text
                            </p>
                            <a href="" class="card-link">ini link</a>
                            <a href="" class="card-link">ini link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                
            </div>
        </div>
    </div>
</body>
</html>