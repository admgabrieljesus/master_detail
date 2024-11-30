import React from 'react';
import CompraForm from './Form';

const CompraEdit = ({ compra }) => {
    return <CompraForm compra={compra} action="edit" />;
};

export default CompraEdit;
