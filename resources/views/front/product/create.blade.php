<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBid</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
     crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/product/add-product.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="{{asset('css/product/image-uploader.min.css')}}">
</head>
<body>





    <div class="container">
        <h3>
            <i class="add-product--head">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                  </svg>
                Add Product
            </i>

        </h3>
        <div class="add-product--underline"></div>
        <div class="row mt-5">
            <div class="col-md-6">
                <form enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="add-product--label" for="productName">Product Name</label>
                      <input type="text" class="form-control" id="productName" aria-describedby="emailHelp">

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label class="add-product--label" for="inputState">Category</label>
                            <select id="inputState" class="form-control">
                              <option selected>Electronics</option>
                              <option>Clothes</option>
                              <option>Real Estates</option>
                            </select>
                          </div>
                        <div class="form-group col-md-4">
                            <label class="add-product--label" for="inputState">Location</label>
                            <select id="inputState" class="form-control">
                              <option selected>Cairo</option>
                              <option>Alexandria</option>
                            </select>
                          </div>
                    </div>

                    <div class="form-group ">
                        <label class="add-product--label" for="inputState">Type</label>
                        <select id="inputState" class="form-control">
                          <option selected>Mobiles</option>
                          <option>Video Games</option>
                          <option>Computers</option>
                          <option>Tvs</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label class="add-product--label"  for="exampleInputPassword1">Description</label>
                      <textarea  cols="20" rows="8" class="form-control" id="exampleInputPassword1">
                          </textarea>
                    </div>


            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <label class="add-product--label"  for="exampleInputPassword1">Product Images</label>
                            <div class="input-images" ></div>
                 </div>

                 <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="add-product--label" for="inputState">Color  </label>
                        <select id="inputState" class="form-control">
                          <option selected>Black</option>
                          <option>White</option>
                          <option>Red</option>
                        </select>
                      </div>
                    <div class="form-group col-md-3">
                        <label class="add-product--label" for="inputState">Capacity</label>
                        <select id="inputState" class="form-control">
                          <option selected>64 GB</option>
                          <option>128 GB</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="add-product--label" for="inputState">Size</label>
                        <select id="inputState" class="form-control">
                          <option selected>35</option>
                          <option>36</option>
                        </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="add-product--label" for="inputState">Brand</label>
                        <select id="inputState" class="form-control">
                          <option selected>Apple</option>
                          <option>Samsung</option>
                        </select>
                      </div>
                </div>

                <div class="form-group">
                    <label class="add-product--label" for="productName">Starter Price</label>
                    <input type="number" class="form-control" id="productName" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label class="add-product--label" for="productName">Deadline</label>
                    <input type="date" class="form-control" id="productName" aria-describedby="emailHelp">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary add-product-btn--customize">Add Product</button>
                </div>

                </form>
                  </div>


            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/product/image-uploader.min.js')}}"></script>
    <script src="{{asset('js/product/app.js')}}"></script>
</body>
</html>
