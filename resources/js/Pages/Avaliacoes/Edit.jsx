import React from 'react';
import AvaliacaoForm from './Form';

const AvaliacaoEdit = ({ avaliacao }) => {
    return <AvaliacaoForm avaliacao={avaliacao} action="edit" />;
};

export default AvaliacaoEdit;
