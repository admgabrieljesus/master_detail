import React, { useState } from 'react';
import { useForm } from '@inertiajs/react';

const CompraForm = ({ compra = {}, action }) => {
    const { data, setData, post, put, errors } = useForm({
        nome: compra.nome || '',
        data: compra.data || '',
        valor_total: compra.valor_total || '',
        itens: compra.itens || [],
    });

    const handleItemChange = (index, field, value) => {
        const updatedItens = [...data.itens];
        updatedItens[index][field] = value;
        setData('itens', updatedItens);
    };

    const handleAddItem = () => {
        setData('itens', [
            ...data.itens,
            { produto_id: '', quantidade: '', valor: '' },
        ]);
    };

    const handleRemoveItem = (index) => {
        const updatedItens = data.itens.filter((_, i) => i !== index);
        setData('itens', updatedItens);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        action === 'create' ? post('/compras') : put(`/compras/${compra.id}`);
    };

    return (
        <div className="container mx-auto p-6">
            <h1 className="text-2xl font-bold mb-4">
                {action === 'create' ? 'Criar Compra' : 'Editar Compra'}
            </h1>

            <form onSubmit={handleSubmit} className="space-y-4">
                {/* Campos principais da compra */}
                <div>
                    <label className="block mb-2 text-sm font-medium text-gray-700">Nome</label>
                    <input
                        type="text"
                        className="border p-2 w-full"
                        value={data.nome}
                        onChange={(e) => setData('nome', e.target.value)}
                    />
                    {errors.nome && <p className="text-red-500 text-sm">{errors.nome}</p>}
                </div>

                <div>
                    <label className="block mb-2 text-sm font-medium text-gray-700">Data</label>
                    <input
                        type="date"
                        className="border p-2 w-full"
                        value={data.data}
                        onChange={(e) => setData('data', e.target.value)}
                    />
                    {errors.data && <p className="text-red-500 text-sm">{errors.data}</p>}
                </div>

                <div>
                    <label className="block mb-2 text-sm font-medium text-gray-700">Valor Total</label>
                    <input
                        type="number"
                        className="border p-2 w-full"
                        value={data.valor_total}
                        onChange={(e) => setData('valor_total', e.target.value)}
                    />
                    {errors.valor_total && (
                        <p className="text-red-500 text-sm">{errors.valor_total}</p>
                    )}
                </div>

                {/* Itens da compra */}
                <div>
                    <h3 className="text-xl font-bold mb-2">Itens</h3>
                    {data.itens.map((item, index) => (
                        <div key={index} className="space-y-2 border p-4 rounded mb-4">
                            <input
                                type="text"
                                placeholder="Produto ID"
                                className="border p-2 w-full"
                                value={item.produto_id}
                                onChange={(e) =>
                                    handleItemChange(index, 'produto_id', e.target.value)
                                }
                            />
                            <input
                                type="number"
                                placeholder="Quantidade"
                                className="border p-2 w-full"
                                value={item.quantidade}
                                onChange={(e) =>
                                    handleItemChange(index, 'quantidade', e.target.value)
                                }
                            />
                            <input
                                type="number"
                                placeholder="Valor"
                                className="border p-2 w-full"
                                value={item.valor}
                                onChange={(e) =>
                                    handleItemChange(index, 'valor', e.target.value)
                                }
                            />
                            <button
                                type="button"
                                className="text-red-500 mt-2"
                                onClick={() => handleRemoveItem(index)}
                            >
                                Remover Item
                            </button>
                        </div>
                    ))}
                    <button
                        type="button"
                        className="bg-gray-300 px-4 py-2 rounded"
                        onClick={handleAddItem}
                    >
                        Adicionar Item
                    </button>
                </div>

                <button
                    type="submit"
                    className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    {action === 'create' ? 'Criar' : 'Salvar'}
                </button>
            </form>
        </div>
    );
};

export default CompraForm;