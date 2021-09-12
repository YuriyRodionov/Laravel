<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!">Web Design</a></li>
                        <li><a href="#!">HTML</a></li>
                        <li><a href="#!">Freebies</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li><a href="#!">JavaScript</a></li>
                        <li><a href="#!">CSS</a></li>
                        <li><a href="#!">Tutorials</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>

    <div class="card mb-4">
        <div class="col-md-12">
            <div class="card-header">Оставьте отзыв</div>
            <div class="card-body">
            <form method="post" action="{{ route('news.feedback') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="content">Текст отзыва</label>
                    <input type="text" class="form-control" name="content" id="content" value="{{ old('content') }}">
                </div>

                <br>
                <button type="submit" class="btn btn-success">Отправить</button>

            </form>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="col-md-12">
            <div class="card-header">Форма заказа на агрегацию данных</div>
            <div class="card-body">
                <form method="post" action="{{ route('user.new') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input type="number" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="source">Источник данных для агрегации</label>
                        <input type="text" class="form-control" name="source" id="source" value="{{ old('source') }}">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success">Отправить</button>

                </form>
            </div>
        </div>

    </div>
</div>
