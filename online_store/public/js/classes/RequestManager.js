
export class RequestManager {

   static async sendRequest(url, method, data) {
      try {
         //console.log('url',url);
         //console.log('method',method);
         console.log('data',data);
          const response = await fetch(url, {
              method: method,
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(data)
          });
          //console.log('response', response);
          const result = await response.json();
          console.log('Сервер ответил:', result);
          return result;
      } catch (error) {
          console.error('Ошибка при отправке данных:', error);
          return null;
      }
  }
}