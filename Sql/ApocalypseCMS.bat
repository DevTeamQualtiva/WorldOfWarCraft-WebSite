@echo off
COLOR F0
@echo #**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#
@echo *                                                                       *
@echo *     #########################################################         *
@echo #     #                                                       #         #
@echo *     #    ApocalypseDev - Archivo de unificacion de SQL's    #         *
@echo *     #                                                       #         *
@echo #     #########################################################         #
@echo *                                                                       *
@echo *      Las siguientes lineas uniran todos los archivos sql que          *
@echo #      esten dentro de la carpeta sql/update de manera que ahora        #
@echo *      puedan importar todas las actualizaciones de la carpeta          *
@echo *      con tan solo un archivo en vez de una por una.                   *
@echo #      Por favor no editar este archivo a menos que sepan               #
@echo *      lo que hagan. Gracias                                            *
@echo *                                                                       *
@echo #               *ApocalypseCore 2013*                                   #
@echo *          Desarrollado por ApocalyseCoreTeam                           *
@echo *                                                                       *
@echo #                                                                       #
@echo *          El proceso empezara AHORA!                                   * 
@echo *                                                                       *
@echo #**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#**#
@echo off
pause
@echo off
setlocal EnableDelayedExpansion
set CMSUpdates=ApocalypseDeV_CMS_Updates.sql

if exist %CMSUpdates% del %CMSUpdates%

for %%a in (Update\*.sql) do (
echo /* >>%CMSUpdates%
echo *%%a >>%CMSUpdates%
echo */ >>%CMSUpdates%
copy/b %CMSUpdates%+"%%a" %CMSUpdates%
echo. >>%CMSUpdates%
echo. >>%CMSUpdates%)
