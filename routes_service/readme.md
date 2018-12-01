# configurando

Primeiros passos:
Primeiro configure o **.env**, copie o **.env.example**, configure o DB_DATABASE, DB_USERNAME e o DB_PASSWORD.

em **API_GOOGLE_MAPS**, insira sua chave do Google.
depois desses procedimentos, inicie a instalação:

    composer update
    php artisan migrate
    php artisan db:seed --class=DatabaseSeeder
   
 # Painel Acesso:
 Login: admin@admin.com
 senha: 123456
 
 Utilize o CSV localizado na pasta public/csv/clientes.csv.

faça a importação, e pronto!