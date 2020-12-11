            <div class="card-body">
                <form method="post" action="{{ route('comments.create') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="inputNameComment" class="col-sm-2 col-form-label">
                            Имя
                        </label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="inputNameComment" placeholder="Имя">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmailComment" class="col-sm-2 col-form-label">
                            Email
                        </label>
                        <div class="col-sm-10">
                            <input name="email" type="email" class="form-control" id="inputEmailComment" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputTextComment" class="col-sm-2 col-form-label">
                            Текст
                        </label>
                        <div class="col-sm-10">
                            <textarea name="text" class="form-control" id="inputTextComment" placeholder="Введите текст комментария..." rows="5"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $posts->id }}">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            
                        </div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input name="checkout" class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Сохранить имя и email для следующих комментариев?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                    </div>
                </form>
            </div>
