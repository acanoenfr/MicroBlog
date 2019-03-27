<section>
                    <div class="container">
                        <div class="row">
                                {if isset($flash)}
                                    <div class="alert alert-{$flash[0]}">
                                        <span class="text-muted">{$flash[1]}</span>
                                    </div>
                                {/if}
                                {if $auth}
                                    <form method="post" action="process/add.php" enctype="multipart/form-data">
                                        <div class="col-sm-10">
                                            <div class="form-group">
                                                <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                                        </div>                        
                                    </form>
                                {/if}
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {foreach from=$posts key=key item=post}
                                    <blockquote>
                                        {if isset($post.image) && file_exists("uploads/images/{$post.image}")}
                                            <img class="img-thumbnail" src="vignette.php?id={$post.image}" alt="{$post.image}">
                                        {/if}
                                        <p>{$post.content}</p>
                                        <small class="text-muted">Nombres de vote : {$post.likes} <a class="btn-like" href="#" data-id="{$post.id}">Voter</a></small>
                                        <footer>{$post.username} le {$post.created_at|date_format:"%d/%m/%Y"} à {$post.created_at|date_format:"%H:%m"} {if $auth}<a href="mod.php?id={$post.id}">Modifier</a> <a href="del.php?id={$post.id}">Supprimer</a>{/if}</footer>
                                    </blockquote>
                                {/foreach}
                            </div>
                            <!-- Pagination -->
                            <nav>
                                <ul class="pagination pagination-lg">
                                    <li class="{$prevLink}"><a href="?p={$prev}">&laquo;</a></li>
                                        {for $i=1 to $pages}
                                            <li class="{$current}"><a href="?p={$i}">{$i}</a></li>
                                        {/for}
                                    <li class="{$nextLink}"><a href="?p={$next}">&raquo;</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="container text-center" id="social">
                        <a href="https://acanoen.fr" class="sprite sw" target="_blank"></a>
                        <a href="https://facebook.com/acanoenfr" class="sprite fb" target="_blank"></a>
                        <a href="https://www.youtube.com/channel/UCtTpAl6y52bwdnHdRtYsshQ" class="sprite yt" target="_blank"></a>
                        <a href="https://twitter.com/acanoenfr" class="sprite tw" target="_blank"></a>
                        <a href="https://linkedin.com/in/acanoen" class="sprite in" target="_blank"></a>
                        <a href="https://support.google.com/plus/answer/9217723" class="sprite gp" target="_blank"></a>
                    </div>

                </section>