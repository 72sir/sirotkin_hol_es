<?php

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare($select);
		$stmt->execute(array('id' => $id));
		$result = $stmt->fetchAll();
?>