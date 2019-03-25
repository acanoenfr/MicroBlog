<section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {if isset($flash)}
                            <div class="alert alert-{$flash[0]}">
                                <span class="text-muted">{$flash[1]}</span>
                            </div>
                        {/if}
                        <form method="post" action="process/login.php">
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" id="email" class="form-control">
                                <span class="comments text-muted" id="emailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="comments text-muted" id="passwordError"></span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>