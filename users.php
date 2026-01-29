<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - Product Form</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-white border-bottom">
      <div class="container">
        <a class="navbar-brand fw-semibold" href="home.html">SimpleShop Admin</a>
        <div class="ms-auto d-flex gap-2">
          <a class="btn btn-sm btn-outline-secondary" href="product-list.html">List</a>
          <a class="btn btn-sm btn-primary" href="home.html">Store</a>
        </div>
      </div>
    </nav>

    <main class="py-5">
      <div class="container" style="max-width: 960px">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h1 class="h3 mb-1">Product Form</h1>
            <p class="text-secondary mb-0">Use for create and update in your CRUD flow.</p>
          </div>
          <span class="badge text-bg-light border text-secondary">Mode: Create / Edit</span>
        </div>

        <form class="card shadow-sm">
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-8">
                <label class="form-label">Product name</label>
                <input type="text" class="form-control" placeholder="Basic Tee" />
              </div>
              <div class="col-md-4">
                <label class="form-label">SKU</label>
                <input type="text" class="form-control" placeholder="TS-001" />
              </div>

              <div class="col-md-4">
                <label class="form-label">Price ($)</label>
                <input type="number" class="form-control" min="0" step="0.01" placeholder="19.00" />
              </div>
              <div class="col-md-4">
                <label class="form-label">Stock</label>
                <input type="number" class="form-control" min="0" step="1" placeholder="100" />
              </div>
              <div class="col-md-4">
                <label class="form-label">Category</label>
                <select class="form-select">
                  <option selected>Choose...</option>
                  <option>Apparel</option>
                  <option>Accessories</option>
                  <option>Shoes</option>
                </select>
              </div>

              <div class="col-12">
                <label class="form-label">Image URL</label>
                <input type="url" class="form-control" placeholder="https://example.com/image.jpg" />
              </div>

              <div class="col-12">
                <label class="form-label">Short description</label>
                <input type="text" class="form-control" placeholder="Soft cotton shirt" />
              </div>

              <div class="col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" rows="5" placeholder="Full product description..."></textarea>
              </div>

              <div class="col-md-6">
                <label class="form-label d-block">Status</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="statusActive" checked />
                  <label class="form-check-label" for="statusActive">Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="status" id="statusDraft" />
                  <label class="form-check-label" for="statusDraft">Draft</label>
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label d-block">Featured</label>
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" role="switch" id="featured" checked />
                  <label class="form-check-label" for="featured">Show on home</label>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer bg-white d-flex flex-wrap gap-2 justify-content-between">
            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-outline-primary">Update</button>
            </div>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-outline-danger">Delete</button>
              <a href="product-list.html" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </div>
        </form>

        <div class="alert alert-secondary mt-3 mb-0" role="alert">
          Hook this form to your PHP handler (create/update/delete) by setting <code>action</code> and <code>method</code>.
        </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
