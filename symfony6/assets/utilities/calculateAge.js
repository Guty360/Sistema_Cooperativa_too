export default function calculeteAge(stringDate) {
  //sacar
  let part = stringDate.split('/');
  const date = new Date(`${part[2]}/${part[1]}/${part[0]}`);
  let hoy = new Date();

  let edad = hoy.getFullYear() - date.getFullYear();
  let m = hoy.getMonth() - date.getMonth();

  if (m < 0 || (m === 0 && hoy.getDate() < date.getDate())) {
    edad--;
  }
  return edad;
}
