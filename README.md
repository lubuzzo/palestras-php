# Sistema para cadastro e controle de usuários e palestras.

Usado durante a **SeCoT** - Semana de Computação e Tecnologia que ocorre na **UFSCar Campus Sorocaba**.

O desenvolvimento deste foi feito em **PHP**, utilizando o **Laravel** como framework.

Conta com as operações básicas de cadastro, listagem e remoção de usuários e palestras. Esta versão também conta com o login social via Facebook, Google e GitHub.

Esta versão já efetua o envio do e-mail com o QRCode quando a pessoa efetua o cadastro, ou ao solicitar na aba do perfil.

Também foi atualizado o .gitignore para enviar o arquivo /config/services.php, e este passou a puxar as variáveis do ambiente no arquivo .env, atualizado o .env.example mostrado como deve ser feito.

TODO:
* Modificações visuais na tela inicial (tornar visível a data e horário das palestras)
