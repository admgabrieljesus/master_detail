import React from 'react';
import CompraForm from './Forms';

const CompraEdit = ({ compra }) => {
    return <CompraForm compra={compra} action="edit" />;
};

export default CompraEdit;
