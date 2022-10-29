import axios from 'axios';
import { urlApi } from '../utilities/url';

export const postLogin = ({ email, password }) => {
  axios
    .post(`${urlApi}/login`, {
      username: email,
      password: password,
    })
    .then((response) => {
      if (response.status == '200') alert('Estas autentificado');
    })
    .catch(function (error) {
      alert(error);
    });
};
