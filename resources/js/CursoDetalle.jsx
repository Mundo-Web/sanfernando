import React, { useEffect, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import { Fetch } from 'sode-extend-react'
import arrayJoin from './Utils/ArrayJoin'
import { set } from 'sode-extend-react/sources/cookies'
import SliderFront from './components/Section/SliderFront'
import SliderBenefit from './components/Section/SliderBenefit'
import TwoColumn from './components/Section/TwoColumn'
import Curse from './components/Product/Curse'
import SliderTestimony from './components/Section/SliderTestimony'


const CursoDetalle = () => {
    const sectionStep = 'images/img/palacio.png';
    const imgVideo = 'images/img/mujergp.png';
    const imgPlay = 'images/img/iconoplayblanco.png';


    return (<>
      
     <h2>asdasd</h2>

    </>)
  }

CreateReactScript((el, properties) => {
    createRoot(el).render(<CursoDetalle {...properties} />);
})