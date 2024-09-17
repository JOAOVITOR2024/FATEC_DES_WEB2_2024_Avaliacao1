primeiro codigo (comeco.php) 
foi a tela de login do sistema, foi usado SESSION e header para validar se o usúario já estiver logado, no mesmo codigo também foi feito para confirmar as credencias usadas pelo usuario, 
a tela só seria direcionada para a pagina inicial.php se o login do usuario fosse igual a "coordenacao" e a senha "coordenacao" ou se fosse usado o usuario "tecnicos" e a senha "tecnicos".


segundo codigo(inicial.php) 
foi feito para que somente o usuario "coordenacao" tenha autonomia para fazer uma solicitação de serviço, o codigo (if ($_session['username'] == coordenacao)) garante isso.


terceiro codigo (sair.php) 
faz com que se o usuario clique nesse botao a sessão é atomaticamente destruida com (session_destroy()) e ele é lançado de volta para comeco.php graças a funçaõ header.


o quarto codigo (solicitacao.php) 
começa iniciando uma session que faz com que se o usuario for diferente de "coordenacao" ele é direcionado diretamente para comeco.php no html desse codigo podemos ver que foi criado um form
com o direcionamento para processar_solicitacao.php que ira validar a solicitacao.


quinto codigo (precessar_solicitacao.php) 
ele ja inicia uma session que faz com que se o usuario for diferente de "coordenacao" ele é direcionado diretamente para comeco.php. abaixo disso é possivel ver que as variaveis $descricao
$laboratorio, $prazo e $curso sendo definidos pela definição dada pelo usuario pelo metodo POST (trim é usado para ignorar os espaços no começo e no final da frase). abaixo é usado para que se a variavel estiver vazia 
a mensagem "todos os campos devem ser preenchidos" apareça. isso é verificado usando a função empty. depois temos o codigo para que verifique o curso escolhido pelo usuario e salva no arquivo texto solicitacoes.txt 
essas informações. abaixo é usado a variavel request para que seja definida a sequencia que sera digitada no arquivo texto.


sexto codigo (vizualizar_solicitacoes.php) 
esse codigo permite que todas as solicitaçoes feitas em solicitacao.php apareçam em um formato de tabela de resgistros, ele define que se o $curso for DSM ou GE a varieavel $file seja definida como 'solicitacoes.txt'
abaixo a definição !file_exists($file) faz com que verifique se a solicitações para serem mostradas. <?php echo htmlspecialchars($request); ?> imprime o conteúdo de $request dentro da célula. 
<?php foreach ($requests as $index => $request): ?> é usado para passar por arrays e mostrar seus valores, isso foi feito na array $$request.
