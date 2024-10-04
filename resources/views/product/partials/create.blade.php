  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Product</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <form enctype="multipart/form-data" action="/products/store" method="post">

                      @csrf
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Product name</label>
                          <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                              placeholder="Insert a valid Product name" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Product price</label>
                          <input name="price" min="0" type="number" class="form-control" id="exampleInputEmail1"
                              placeholder="Insert a valid Product price" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Items in Stock</label>
                          <input name="stock" type="number" min="0" class="form-control" id="exampleInputEmail1"
                              placeholder="How many item on stock ?" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">

                          <div class="mb-3">

                              <label for="exampleInputEmail1" class="form-label">Product Category</label>

                              <select name="category" class="form-control" id="exampleInputEmail1"
                                  placeholder="Insert a Valid Product name" aria-describedby="emailHelp">
                                  <option selected disabled value="">Select Product Category</option>
                                  <option value="men">Men</option>
                                  <option value="women">Women</option>
                                  <option value="child">Child</option>
                              </select>



                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Product Image</label>
                              <input name="image" accept="image/*" type="file" class="form-control" id="exampleInputEmail1"
                                  placeholder="Insert a Valid Product name" aria-describedby="emailHelp">
                          </div>



                      </div>
                      <div class="modal-footer">
                          <button class="px-5 rounded-lg py-2 bg-alpha" type="submit" class="bg-alpha">Save</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
