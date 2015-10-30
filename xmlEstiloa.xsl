<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
	        <head><link rel="stylesheet" type="text/css" href="stylesPWS/css.css" /></head>
            <body><center>
                <h2>XML GALDERAK</h2>
            </center>
                <table width="100%">
                    <tr>
                        <th>Galdera</th>
                        <th>Erantzuna</th>
                        <th>Zailtasuna</th>
						<th>Gaia</th>

                    </tr>
                    <xsl:for-each select="assessmentItems/assessmentItem">
                        <tr>
                            <td align="center"><xsl:value-of select="itemBody/element"/></td>
                            <td align="center"><xsl:value-of select="correctResponse/value"/></td>                                                  							<td align="center"><xsl:value-of select="@complexity"/></td>
       						<td align="center"><xsl:value-of select="@subject"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

