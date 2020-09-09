function validar()
{
	if (document.frmContato.nome.value == "")
	{
		alert("Nome não preenchido!");
		document.frmContato.nome.focus();
		return false;
	}
	if (document.frmContato.cpf.value == "")
	{
		alert("CPF não preenchido!");
		document.frmContato.cpf.focus();
		return false;
	}
	if (document.frmContato.email.value == "")
	{
		alert("E-mail não preenchido!");
		document.frmContato.email.focus();
		return false;
	}
	if (document.frmContato.telefone.value == "")
	{
		alert("Telefone não preenchido!");
		document.frmContato.telefone.focus();
		return false;
	}
	if (document.frmContato.mensagem.value == "")
	{
		alert("Mensagem não preenchido!");
		document.frmContato.mensagem.focus();
		return false;
	}
	
	return true;
}