import React, { useState } from "react";
import Tooltip from "@mui/material/Tooltip";
import axios from "axios";
import {
  Avatar,
  Button,
  CssBaseline,
  TextField,
  Link,
  Grid,
  Box,
  Typography,
  Container,
} from "@mui/material";
import { Handshake, Info } from "@mui/icons-material";
import { createTheme, ThemeProvider } from "@mui/material/styles";
import { Formik, Form, ErrorMessage } from "formik";
import AlertComp from "../../components/Alert";
import { reEmail } from "../../utilities/regularExpression";
import { urlApi } from "../../utilities/url";
import { useAuth } from "../../Context/AuthContext";
import { useNavigate } from "react-router-dom";
import Copyright from "../../components/Copytight";

const theme = createTheme();
var btnActivo = false;
const validate = (value) => {
  const error = {};

  // Validacion password

  if (!value.currentPass) {
    error.currentPass = "Debes escribir tu contraseña actual";
    btnActivo = false;
  }

  if (!value.pass) {
    error.pass = "Debes definir una nueva contraseña";
    btnActivo = false;
  }

  if (!value.passConfirm) {
    error.passConfirm = "Debes confirmar tu contraseña";
    btnActivo = false;
  } else if (value.passConfirm === value.pass) btnActivo = true;
  else {
    btnActivo = false;
    error.passConfirm = "Las contraseñas deben ser iguales";
  }

  return error;
};

export default function NuevaContrasenia() {
  //Designar el loggeo del usuario
  const { user } = useAuth();
  //Redireccionar al usuario
  const navigate = useNavigate();
  const [error, setError] = useState();

  const submit = (value, { resetForm }) => {
    // resetForm();
    setError("");
  };

  return (
    <React.Fragment>
      <ThemeProvider theme={theme}>
        <Container component="main" maxWidth="xs" sx={{ marginTop: 25 }}>
          <CssBaseline />
          <Box
            sx={{
              marginTop: 8,
              display: "flex",
              flexDirection: "column",
              alignItems: "center",
            }}
          >
            <Link href="/" underline="none">
              <Avatar sx={{ m: 1, bgcolor: "#16382c", width: 56, height: 56 }}>
                <Handshake href="/" />
              </Avatar>
            </Link>

            <Typography component="h1" variant="h4" sx={{ color: "#ff7334" }}>
              Nueva Contraseña
            </Typography>
            {error && <p>{error}</p>}
            <Formik
              initialValues={{
                currentPass: "",
                pass: "",
                passConfirm:"",
              }}
              validate={validate}
              onSubmit={submit}
            >
              {({ values, errors, handleChange, handleBlur }) => (
                <Form noValidate fullWidth sx={{ mt: 1 }}>
                  <Typography
                    component="p"
                    variant="body1"
                    align="justify"
                    sx={{
                      color: "rgb(22, 56, 44)",
                      fontWeight: "405",
                      marginTop: "20px",
                      fontSize: "18px",
                    }}
                  >
                    Escribe la contraseña actual.
                  </Typography>
                  <Box
                    sx={{
                      display: "flex",
                      flexDirection: "row",
                      alignItems: "center",
                      justifyContent: "center",
                    }}
                  >
                    <TextField
                      id="currentPass"
                      name="currentPass"
                      margin="normal"
                      required
                      fullWidth
                      autoFocus
                      label="Contraseña actual"
                      autoComplete="currentPass"
                      type="password"
                      value={values.currentPass}
                      onChange={handleChange}
                      onBlur={handleBlur}
                      sx={{ mb: 0 }}
                    />

                    <Tooltip
                      fullWidth
                      title="Si estás recuperando tu contraseña o es primera vez que inicias,
                        escribe la clave temporal que se te envió por correo electrónico."
                    >
                      <Avatar sx={{ m: 1 }}>
                        <Info href="#"></Info>
                      </Avatar>
                    </Tooltip>
                  </Box>

                  <ErrorMessage
                    name="currentPass"
                    component={() => <AlertComp text={errors.currentPass} />}
                  />

                  <Typography
                    component="p"
                    variant="body1"
                    align="justify"
                    sx={{
                      color: "rgb(22, 56, 44)",
                      fontWeight: "405",
                      marginTop: "20px",
                      fontSize: "18px",
                    }}
                  >
                    Escribe una nueva contraseña.
                  </Typography>

                  <TextField
                    id="pass"
                    name="pass"
                    margin="normal"
                    required
                    fullWidth
                    label="Contraseña"
                    autoComplete="pass"
                    type="password"
                    value={values.pass}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    sx={{ mb: 0 }}
                  />
                  <ErrorMessage
                    name="pass"
                    component={() => <AlertComp text={errors.pass} />}
                  />

                  <TextField
                    id="passConfirm"
                    name="passConfirm"
                    margin="normal"
                    required
                    fullWidth
                    label="Confirmar Contraseña"
                    autoComplete="passConfirm"
                    type="password"
                    value={values.passConfirm}
                    onChange={handleChange}
                    onBlur={handleBlur}
                    sx={{ mb: 0 }}
                  />
                  <ErrorMessage
                    name="passConfirm"
                    component={() => <AlertComp text={errors.passConfirm} />}
                  />
                  <Button
                    disabled={btnActivo !== true}
                    className="boton-ingreso"
                    type="submit"
                    fullWidth
                    variant="contained"
                    id="boton1"
                    sx={{
                      marginTop: 3,
                      marginBottom: 2,
                      backgroundColor: "#ff7334",
                    }}
                  >
                    Establecer nueva contraseña
                  </Button>
                </Form>
              )}
            </Formik>
          </Box>
          <Copyright sx={{ mt: 8, mb: 4 }} />
        </Container>
      </ThemeProvider>
    </React.Fragment>
  );
}
