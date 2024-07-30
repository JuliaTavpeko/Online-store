
export class RequestManager {

   static async sendRequest(url, method, data) {
      try {
         console.log('url',url);
         console.log('method',method);
         console.log('data',data);
          const response = await fetch(url, {
              method: method,
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(data)
          });
          console.log('response', response);
          const result = await response.json();
          console.log('Сервер ответил:', result);
          return result;
      } catch (error) {
          console.error('Ошибка при отправке данных:', error);
          return null;
      }
  }
}










/*const mysql = require('mysql');

const conn = mysql.createConnection({
   host: "localhost",
   user: "root",
   password: "",
   database: "Store",
});

conn.connect(err => {
   if(err){
      console.log(err);
      return err;
   } else {
      console.log('Database connect');
   }
});

let query = 'SELECT * FROM User';
conn.query(query, (err, result, field) => {
   console.log(err);
   console.log(result);
   //console.log(field);
});

conn.end(err => {

});*/





/*
// Бэкенд (PHP)
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
   $title = $data['title'];
   $description = $data['description'];
   $price = $data['price'];

   // Ваша логика обработки данных
   // ...
   echo json_encode(['success' => true]);
} else {
   echo json_encode(['error' => 'Некорректные данные']);
}*/