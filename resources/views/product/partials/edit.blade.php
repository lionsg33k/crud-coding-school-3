<div class="modal fade" id="updateModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" action="{{ route("product.update" , $product->id) }}" method="post">

                    @csrf @method("PUT")
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product name</label>
                        <input value="{{ old("name" , $product->name) }}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Insert a valid Product name" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product price</label>
                        <input value="{{ old("price" , $product->price) }}" name="price" min="0" type="number" class="form-control" id="exampleInputEmail1"
                            placeholder="Insert a valid Product price" aria-describedby="emailHelp">
                    </div>
                    <div  class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Items in Stock</label>
                        <input value="{{ old("stock" , $product->stock) }}" name="stock" type="number" min="0" class="form-control" id="exampleInputEmail1"
                            placeholder="How many item on stock ?" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">

                        <div class="mb-3">

                            <label for="exampleInputEmail1" class="form-label">Product Category</label>

                            <select name="category" class="form-control" id="exampleInputEmail1"
                                placeholder="Insert a Valid Product name" aria-describedby="emailHelp">
                                <option @selected($product->category == "men") value="men">Men</option>
                                <option @selected($product->category == "women") value="women">Women</option>
                                <option @selected($product->category == "child") value="child">Child</option>
                            </select>



                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Image</label>
                            <input name="image" accept="image/*" type="file" class="form-control"
                                id="exampleInputEmail1" placeholder="Insert a Valid Product name"
                                aria-describedby="emailHelp">
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button class="px-5 rounded-lg py-2 bg-alpha" type="submit" class="bg-alpha">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
