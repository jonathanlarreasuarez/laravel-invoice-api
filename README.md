 # schedules-api
 Invoice api - Laravel application
 
# Requisitos
- PHP 8.0 o superior
- Composer
- MySQL 5.7 o superior

# Instalación
Clonar el repositorio:

- git clone https://github.com/jonathanlarreasuarez/laravel-invoice-api.git
- Instalar las dependencias de Composer:
- Crear una copia del archivo .env.example y renombrarla como .env. Luego, configurar las variables de entorno en el archivo .env según tus necesidades.

# Generar una clave de aplicación:
- php artisan key:generate
# Ejecutar las migraciones 

- php artisan migrate:fresh --seed
- php artisan l5-swagger:generate

# Iniciar el servidor de desarrollo:

- php artisan serve

# Acceder a la aplicación en tu navegador web:
- http://localhost:8000

# Rutas 
- Get: http://localhost:8000/api/v1/invoices
- Get: http://localhost:8000/api/v1/invoices/{invoice}
- Post: http://localhost:8000/api/v1/invoices
- Patch: http://localhost:8000/api/v1/invoices/{invoice}
- Delete: http://localhost:8000/api/v1/invoices/{invoice}

# Payload Ejemplo :
- Crear nueva factura
{
    "id_transaction": "123",
    "inv_business_name": "Sistem Name",
    "inv_business_address": "Address Example",
    "inv_ruc": "0010987654321",
    "inv_issue_date": "2022-12-12",
    "inv_accounting_required": "SI",
    "inv_number_document": "123",
    "inv_establishment": "1",
    "inv_emission_point": "1",
    "inv_sequential": "987",
    "inv_buyer_number_identification": "0987654321",
    "inv_buyer_address": "Address Example",
    "inv_buyer_phone": "0985432",
    "inv_buyer_email": "test@mail.com",
    "inv_total_without_tax": 0,
    "inv_total_discount": 0,
    "inv_total_tax_iva": 0,
    "inv_total_amount": 100,
    "inv_currency": "DOLAR"
}
