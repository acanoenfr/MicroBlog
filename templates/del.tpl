<section>
            <div class="container">
                <div class="row">
                    {if isset($flash)}
                        <div class="alert alert-{$flash[0]}">
                            <span class="text-muted">{$flash[1]}</span>
                        </div>
                    {/if}
                    <form method="post" action="process/del.php">
                        <div class="alert alert-warning">
                            <span class="text-muted">Êtes-vous sûr de supprimer ce message (ID={$id}) ?</span>
                        </div>
                        <div class="d-inline">
                            <input type="hidden" name="id" value="{$id}">
                            <a href="index.php" class="btn btn-primary btn-lg">Non, conserver</a>
                            <button type="submit" class="btn btn-success btn-lg">Oui, supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>