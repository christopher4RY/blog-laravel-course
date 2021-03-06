<x-layout>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6 mx-auto">
                <h1 class="text-primary text-center">Register Form</h1>
                <div class="card my-4 p-3">
                    <form action="" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" required   name="name" value="{{old('name')}}"  class="form-control" id="name">
                        </div>
                        <x-error name="name" />
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text"  required name="username" value="{{old('username')}}" class="form-control" id="username">
                        </div>
                        <x-error name="username" />
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email"  required name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <x-error name="email" />
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password"  required name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <x-error name="password" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
