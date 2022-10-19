import React from 'react';
import Box from '@mui/material/Box';
import { Stepper, Container } from '@mui/material';
import Step from '@mui/material/Step';
import StepLabel from '@mui/material/StepLabel';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';
import { LocalActivitySharp } from '@mui/icons-material';
import InformacionPersonal from './InformacionPersonal';
import InformacionDomicilio from './InformacionDomicilio';
import ActividadEconomica from './ActividadEconomica';
import Beneficiarios from './Beneficiarios';
import Referencias from './Referencias';
import ImprimirSolicitud from './ImprimirSolicitud';
import AnexarDocumentos from './AnexarDocumentos';
const steps = [
  'Información personal y documentos',
  'Información domicilio',
  'Actividad económica',
  'Referencias personales y familiares',
  'Beneficiarios',
  'Imprimir solicitud',
  'Anexar documentos',
];

export default function Ingreso() {
  const [activeStep, setActiveStep] = React.useState(0);

  const handleNext = () => {
    setActiveStep((prevActiveStep) => prevActiveStep + 1);
  };

  const handleBack = () => {
    setActiveStep((prevActiveStep) => prevActiveStep - 1);
  };

  const handleSkip = () => {
    setActiveStep((prevActiveStep) => prevActiveStep + 1);
  };

  const handleReset = () => {
    setActiveStep(0);
  };
  function mostrarPaginas() {
    switch (activeStep) {
      case 0:
        return <InformacionPersonal />;
        break;
      case 1:
        return <InformacionDomicilio />;
        break;
      case 2:
        return <ActividadEconomica />;
        break;
      case 3:
        return <Beneficiarios />;
        break;
      case 4:
        return <Referencias />;
        break;
      case 5:
        return <ImprimirSolicitud />;
        break;
      case 6:
        return <AnexarDocumentos />;
        break;
    }
  }
  return (
    <Container>
      <Stepper activeStep={activeStep}>
        {steps.map((label, index) => {
          const stepProps = {};
          const labelProps = {};
          return (
            <Step key={label} {...stepProps}>
              <StepLabel {...labelProps}>{label}</StepLabel>
            </Step>
          );
        })}
      </Stepper>
      {activeStep === steps.length ? (
        <React.Fragment>
          <Typography variant='h1' sx={{ mt: 2, mb: 1 }}>
            Solicitud lista para enviar!!
          </Typography>
          <Box sx={{ display: 'flex', flexDirection: 'row', pt: 2 }}>
            <Box sx={{ flex: '1 1 auto' }} />
            <Button href='/'>Enviar Solicitud</Button>
          </Box>
        </React.Fragment>
      ) : (
        <React.Fragment>
          {mostrarPaginas()}
          <Box sx={{ display: 'flex', flexDirection: 'row', pt: 2 }}>
            <Button
              color='inherit'
              variant='contained'
              disabled={activeStep === 0}
              onClick={handleBack}
              sx={{ mr: 1 }}
            >
              Back
            </Button>
            <Box sx={{ flex: '1 1 auto' }} />
            <Button onClick={handleNext} variant='contained'>
              {activeStep === steps.length - 1 ? 'Finalizar' : 'Siguiente'}
            </Button>
          </Box>
        </React.Fragment>
      )}
    </Container>
  );
}
