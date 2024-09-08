import React, { useEffect, useState } from 'react'
import CreateReactScript from './Utils/CreateReactScript'
import { createRoot } from 'react-dom/client'

const Diploma = () => {
    const imgPlay = 'images/img/logorojodiploma.png';
    const qrprueba = 'images/img/qrprueba.png';
    const fondoizquierdo = 'images/img/fondoizquierdo.png';
    const puntosderecha = 'images/img/puntosderecha.png';
    const certif = 'images/img/certif.png';
  
    return (
      <>
        <div style={{ marginLeft: 'auto', marginRight: 'auto' }}>
          <div
            style={{
              width: '1000px', 
              height: '700px',
              display: 'flex',
              margin: '0', 
            }}
          >
            <div
              style={{
                width: '150px',
                height: '100%',
                backgroundColor: '#CF072C',
                borderTopRightRadius: '50px',
                backgroundSize: 'cover',
                backgroundImage: `url(${fondoizquierdo})`,
              }}
            ></div>
            <div
              style={{
                width: '850px', // Ajusta el ancho para que todo encaje
                height: '100%',
                padding: '2rem', // Ajusta el padding para que sea más compacto
                position: 'relative',
              }}
            >
              <div
                style={{
                  display: 'flex',
                  flexDirection: 'column',
                  gap: '1.5rem', // Reduce el gap para que no se extienda demasiado
                  alignItems: 'flex-start',
                  justifyContent: 'center',
                }}
              >
                <div
                  style={{
                    display: 'flex',
                    flexDirection: 'row',
                    justifyContent: 'space-between',
                    width: '100%',
                    alignItems: 'center',
                  }}
                >
                  <div style={{ width: '200px' }}>
                    <img
                      src={imgPlay}
                      alt="logo"
                      style={{ width: '100%' }}
                    />
                  </div>
                  <div style={{ width: '90px', marginRight: '25px' }}>
                    <img src={qrprueba} alt="logo" style={{ width: '100%' }} />
                  </div>
                </div>
                <div
                  style={{
                    color: '#CF072C',
                    textTransform: 'uppercase',
                    fontSize: '30px',
                    textAlign: 'center',
                    fontWeight: 'bold',
                    marginLeft: 'auto',
                    marginRight: 'auto',
                    maxWidth:'700px',
                  }}
                >
                  DIPLOMADO EN REACT AVANZADO REACT AVANZADO REACT AVANZADO
                </div>
                <div
                  style={{
                    fontSize: '17px',
                    color: 'black',
                    paddingLeft: '0.75rem',
                    paddingRight: '0.75rem',
                    maxWidth: '700px', // Reduce el tamaño del texto
                    textAlign: 'center',
                    marginLeft: 'auto',
                    marginRight: 'auto',
                  }}
                >
                  En mérito a su participación en nuestro{' '}
                  <span
                    style={{
                      textTransform: 'uppercase',
                      fontStyle: 'italic',
                      fontWeight: 'bold',
                      fontSize: '18px',
                    }}
                  >
                    REACT AVANZADO.
                  </span>
                  <br />
                  Organizado por EGESPP, con una duracion de 300 horas lectivas
                  del 2024.
                </div>
                <div
                  style={{
                    textAlign: 'center',
                    fontSize: '25px',
                    fontWeight: 'bold',
                    width: '100%',
                    marginLeft: 'auto',
                    marginRight: 'auto',
                  }}
                >
                  DIEGO MARTINEZ RAYME
                </div>
                <div
                  style={{
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    flexDirection: 'row',
                    gap: '2rem', // Ajusta la separación de los elementos
                    margin: 'auto',
                    marginTop:'4rem',
                  }}
                >
                  <div
                    style={{
                      textAlign: 'center',
                      color: 'black',
                      fontSize: '18px',
                      fontWeight: 'bold',
                      borderTop: '1px solid black',
                      width: '250px',
                    }}
                  >
                    Gerente General
                    <br />
                    <span
                      style={{
                        fontWeight: 'normal',
                        fontSize: '17px',
                      }}
                    >
                      Patricia Heredia Olivera
                    </span>
                  </div>
                  <div
                    style={{
                      textAlign: 'center',
                      color: 'black',
                      fontSize: '18px',
                      fontWeight: 'bold',
                      borderTop: '1px solid black',
                      width: '250px',
                    }}
                  >
                    Sub. Gerente Académico
                    <br />
                    <span
                      style={{
                        fontWeight: 'normal',
                        fontSize: '17px',
                      }}
                    >
                      Edwin Chichipe Salazar
                    </span>
                  </div>
                </div>
                <div>
                  <h2 style={{ fontWeight: 600, fontSize: '17px' }}>
                    Nuestros Convenios
                  </h2>
                  <div
                    style={{
                      marginTop: '0.75rem',
                      display: 'flex',
                      flexDirection: 'row',
                      gap: '1.25rem',
                    }}
                  >
                    <img
                      src={certif}
                      alt="certif_1"
                      style={{ width: '4.5rem' }}
                    />
                    <img
                      src={certif}
                      alt="certif_2"
                      style={{ width: '4.5rem' }}
                    />
                    <img
                      src={certif}
                      alt="certif_3"
                      style={{ width: '4.5rem' }}
                    />
                  </div>
                </div>
              </div>
              <div style={{ position: 'absolute', top: '8rem', right: 0 }}>
                <img
                  src={puntosderecha}
                  alt="logo"
                  style={{ width: '25px' }}
                />
              </div>
            </div>
          </div>
        </div>
      </>
    );
  };

  

CreateReactScript((el, properties) => {
createRoot(el).render(
<Diploma {...properties} />);
})
