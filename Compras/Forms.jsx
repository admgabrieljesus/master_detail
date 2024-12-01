import React, { useState, useEffect } from "react";
import { useForm } from "@inertiajs/react";

const CompraForm = ({ compra = {}, action }) => {
	const { data, setData, post, put, errors } = useForm({
		nome: compra.nome || "",
		data: compra.data || "",
		valor_total: compra.valor_total || 0,
		itens: compra.itens || [],
	});

	const [formError, setFormError] = useState("");

	useEffect(() => {
		const total = data.itens.reduce((sum, item) => {
			const itemTotal =
				(parseFloat(item.quantidade) || 0) * (parseFloat(item.valor) || 0);
			return sum + itemTotal;
		}, 0);
		setData("valor_total", total);
	}, [data.itens]);

	const calculateItemSubtotal = (item) => {
		return (parseFloat(item.quantidade) || 0) * (parseFloat(item.valor) || 0);
	};

	const handleItemChange = (index, field, value) => {
        const updatedItens = [...data.itens];
        updatedItens[index][field] = value;
    
        // Remove erros de duplicidade enquanto o usuário edita
        if (field === 'produto_id') {
            const produtoIds = updatedItens.map(item => item.produto_id);
            const hasDuplicates = new Set(produtoIds).size !== produtoIds.length;
            if (hasDuplicates) {
                setFormError('Não é permitido incluir itens duplicados na compra.');
            } else {
                setFormError('');
            }
        }
    
        setData('itens', updatedItens);
    };
    
    

	const handleAddItem = () => {
		if (data.itens.length < 5) {
			setData("itens", [
				...data.itens,
				{ produto_id: "", quantidade: "", valor: "" },
			]);
		}
	};

	const handleRemoveItem = (index) => {
		const updatedItens = data.itens.filter((_, i) => i !== index);
		setData("itens", updatedItens);
	};

	const handleSubmit = (e) => {
        e.preventDefault();
    
        // Verifica se todos os campos estão preenchidos
        if (data.itens.some(item => !item.produto_id || !item.quantidade || !item.valor)) {
            setFormError('Todos os campos dos itens devem ser preenchidos.');
            return;
        }
    
        // Verifica duplicatas no produto_id
        const produtoIds = data.itens.map(item => item.produto_id);
        const hasDuplicates = new Set(produtoIds).size !== produtoIds.length;
        if (hasDuplicates) {
            setFormError('Não é permitido incluir itens duplicados na compra.');
            return;
        }
    
        setFormError('');
        action === 'create' ? post('/compras') : put(`/compras/${compra.id}`);
    };
    

	return (
		<div className="container mx-auto p-6">
			<h1 className="text-2xl font-bold mb-4">
				{action === "create" ? "Criar Compra" : "Editar Compra"}
			</h1>

			<form onSubmit={handleSubmit} className="space-y-4">
				<div>
					<label className="block mb-2 text-sm font-medium text-gray-700">
						Nome
					</label>
					<input
						type="text"
						className="border p-2 w-full"
						value={data.nome}
						onChange={(e) => setData("nome", e.target.value)}
					/>
					{errors.nome && <p className="text-red-500 text-sm">{errors.nome}</p>}
				</div>

				<div>
					<label className="block mb-2 text-sm font-medium text-gray-700">
						Data
					</label>
					<input
						type="date"
						className="border p-2 w-full"
						value={data.data}
						onChange={(e) => setData("data", e.target.value)}
					/>
					{errors.data && <p className="text-red-500 text-sm">{errors.data}</p>}
				</div>

				<div>
					<label className="block mb-2 text-sm font-medium text-gray-700">
						Valor Total
					</label>
					<input
						type="number"
						className="border p-2 w-full bg-gray-100"
						value={data.valor_total}
						readOnly
					/>
				</div>

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
									handleItemChange(index, "produto_id", e.target.value)
								}
							/>
							<input
								type="number"
								placeholder="Quantidade"
								className="border p-2 w-full"
								value={item.quantidade}
								onChange={(e) =>
									handleItemChange(index, "quantidade", e.target.value)
								}
							/>
							<input
								type="number"
								placeholder="Valor Unitário"
								className="border p-2 w-full"
								value={item.valor}
								onChange={(e) =>
									handleItemChange(index, "valor", e.target.value)
								}
							/>
							<input
								type="number"
								className="border p-2 w-full bg-gray-100"
								value={calculateItemSubtotal(item)}
								readOnly
								placeholder="Subtotal"
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
						className={`bg-gray-300 px-4 py-2 rounded ${
							data.itens.length >= 5 ? "opacity-50 cursor-not-allowed" : ""
						}`}
						onClick={handleAddItem}
						disabled={data.itens.length >= 5}
					>
						Adicionar Item
					</button>
				</div>

				{formError && <p className="text-red-500 text-sm">{formError}</p>}

				<button
					type="submit"
					className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
				>
					{action === "create" ? "Criar" : "Salvar"}
				</button>
			</form>
		</div>
	);
};

export default CompraForm;
