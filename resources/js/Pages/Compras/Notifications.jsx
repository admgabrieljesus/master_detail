import React, { useEffect, useState } from "react";
import axios from "axios";

const Notifications = () => {
	const [notifications, setNotifications] = useState([]);

	// Função assíncrona para buscar as notificações
	const fetchNotifications = async () => {
		try {
			const response = await axios.get("/listnotifications");
			setNotifications(response.data);
      console.log(response.data)
		} catch (error) {
			console.error("Erro ao recuperar notificações:", error.response);
		}
    
	};

	useEffect(() => {
		fetchNotifications();
	}, []); // A requisição é feita apenas uma vez, na primeira renderização.

	return (
		<div>
			<h2>Notificações</h2>
			<ul>
				{notifications.map((notification) => (
					<li key={notification.id}>
						{notification.data.action === "created"
							? "Nova Compra: "
							: "Compra Atualizada: "}
						{notification.data.nome} (R${" "}
						{notification.data.valor_total})
					</li>
				))}
			</ul>
		</div>
	);
};
export default Notifications;
