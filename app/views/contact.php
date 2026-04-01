<?php $this->layout('master'); ?>

<h1>Contact</h1>

<form action="/contact" method="post">
    <input type="text" name="nome" id="nome" placeholder="Nome">
    <input type="text" name="email" id="email" placeholder="E-mail">
    <button type="submit">Enviar</button>
</form>