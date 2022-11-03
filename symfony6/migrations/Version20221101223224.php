<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221101223224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actividad_economica (id INT AUTO_INCREMENT NOT NULL, estudio_socio_economico_id INT NOT NULL, constancia_salario VARCHAR(255) NOT NULL, empresario TINYINT(1) NOT NULL, empleado TINYINT(1) NOT NULL, profesion VARCHAR(255) NOT NULL, rubro_actividad_economica VARCHAR(255) NOT NULL, salario DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_ADF21DE9F64A67D9 (estudio_socio_economico_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asociado (id INT AUTO_INCREMENT NOT NULL, solicitud_id INT NOT NULL, persona_id INT DEFAULT NULL, estado_familiar_id INT DEFAULT NULL, direccion_id INT DEFAULT NULL, actividad_economica_id INT NOT NULL, mandamiento_pago_id INT NOT NULL, carnet_id INT NOT NULL, contrato_id INT DEFAULT NULL, cuenta_aportacion_id INT DEFAULT NULL, cuenta_ahorro_id INT NOT NULL, carnet_minoridad_id INT NOT NULL, pasaporte_id INT NOT NULL, nup_id INT NOT NULL, nit_id INT NOT NULL, isss_id INT NOT NULL, dui_id INT NOT NULL, tarjeta_iva_id INT NOT NULL, hoja_legal_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, telefono_trabajo VARCHAR(255) NOT NULL, telefono_fijo VARCHAR(255) NOT NULL, genero VARCHAR(255) NOT NULL, nacionalidad VARCHAR(255) NOT NULL, pais_nacimiento VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5074CE1CE7927C74 (email), UNIQUE INDEX UNIQ_5074CE1C1CB9D6E4 (solicitud_id), UNIQUE INDEX UNIQ_5074CE1CF5F88DB9 (persona_id), UNIQUE INDEX UNIQ_5074CE1C2ACEE421 (estado_familiar_id), UNIQUE INDEX UNIQ_5074CE1CD0A7BD7 (direccion_id), UNIQUE INDEX UNIQ_5074CE1C6CADD19E (actividad_economica_id), UNIQUE INDEX UNIQ_5074CE1CA4B912AF (mandamiento_pago_id), UNIQUE INDEX UNIQ_5074CE1CFA207516 (carnet_id), UNIQUE INDEX UNIQ_5074CE1C70AE7BF1 (contrato_id), UNIQUE INDEX UNIQ_5074CE1CC24EE1EB (cuenta_aportacion_id), UNIQUE INDEX UNIQ_5074CE1CC1DEF9EC (cuenta_ahorro_id), UNIQUE INDEX UNIQ_5074CE1C2438E450 (carnet_minoridad_id), UNIQUE INDEX UNIQ_5074CE1C964DF955 (pasaporte_id), UNIQUE INDEX UNIQ_5074CE1C40311C88 (nup_id), UNIQUE INDEX UNIQ_5074CE1C6A43F15C (nit_id), UNIQUE INDEX UNIQ_5074CE1C500C2068 (isss_id), UNIQUE INDEX UNIQ_5074CE1CCCBB27FB (dui_id), UNIQUE INDEX UNIQ_5074CE1C9BB934BA (tarjeta_iva_id), UNIQUE INDEX UNIQ_5074CE1C276E70AD (hoja_legal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beneficiario (id INT AUTO_INCREMENT NOT NULL, asociado_id INT NOT NULL, persona_id INT NOT NULL, porcentaje DOUBLE PRECISION NOT NULL, parentesco VARCHAR(255) NOT NULL, INDEX IDX_E8D0B617716CD091 (asociado_id), UNIQUE INDEX UNIQ_E8D0B617F5F88DB9 (persona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cargo (id INT AUTO_INCREMENT NOT NULL, mandamiento_pago_id INT DEFAULT NULL, cantidad INT NOT NULL, descripcion VARCHAR(255) NOT NULL, monto_pago DOUBLE PRECISION NOT NULL, INDEX IDX_3BEE5771A4B912AF (mandamiento_pago_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carnet (id INT AUTO_INCREMENT NOT NULL, fecha_emision DATE NOT NULL, fecha_vencimiento DATE NOT NULL, fotografia INT NOT NULL, numero VARCHAR(255) NOT NULL, carnet_generado VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carnet_minoridad (id INT AUTO_INCREMENT NOT NULL, documento7_id INT NOT NULL, UNIQUE INDEX UNIQ_B28E6AA8D32D3733 (documento7_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contrato (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(255) NOT NULL, fotocopia INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conyuge (id INT AUTO_INCREMENT NOT NULL, persona_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_ABFBD0BFF5F88DB9 (persona_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuenta (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(255) NOT NULL, cuota_mensual DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuenta_ahorro (id INT AUTO_INCREMENT NOT NULL, cuenta_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_14447F489AEFF118 (cuenta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cuenta_aportacion (id INT AUTO_INCREMENT NOT NULL, cuenta_id INT NOT NULL, UNIQUE INDEX UNIQ_F60DF0BF9AEFF118 (cuenta_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE direccion (id INT AUTO_INCREMENT NOT NULL, ubicaciongeografica_id INT DEFAULT NULL, alquila TINYINT(1) NOT NULL, residencia VARCHAR(255) NOT NULL, calle VARCHAR(255) NOT NULL, numero_casa VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F384BE95FFC22FF3 (ubicaciongeografica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(255) NOT NULL, fotocopia VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dui (id INT AUTO_INCREMENT NOT NULL, documento2_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_D6B9EEA1E4F3C701 (documento2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estado_familiar (id INT AUTO_INCREMENT NOT NULL, conyuge_id INT DEFAULT NULL, estado_civil VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7BC279B3314923D (conyuge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estudio_socio_economico (id INT AUTO_INCREMENT NOT NULL, capacidad_ahorro DOUBLE PRECISION NOT NULL, gastos_medicos DOUBLE PRECISION NOT NULL, gastos_credito DOUBLE PRECISION NOT NULL, gastos_educacion DOUBLE PRECISION NOT NULL, gastos_fijos DOUBLE PRECISION NOT NULL, otros_ingresos DOUBLE PRECISION NOT NULL, gastos_personales DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hoja_legal (id INT AUTO_INCREMENT NOT NULL, documento8_id INT NOT NULL, UNIQUE INDEX UNIQ_161214CA8B4E2765 (documento8_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE isss (id INT AUTO_INCREMENT NOT NULL, documento3_id INT NOT NULL, UNIQUE INDEX UNIQ_FCC3BB2F5C4FA064 (documento3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mandamiento_pago (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(255) NOT NULL, estado TINYINT(1) NOT NULL, fecha_realizado_pago DATE NOT NULL, fecha_emision DATE NOT NULL, total_apagar DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE negocio (id INT AUTO_INCREMENT NOT NULL, direccion_id INT NOT NULL, actividad_economica_id INT NOT NULL, nombre_legal VARCHAR(255) NOT NULL, nombre_comercial VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, correo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7528E379D0A7BD7 (direccion_id), INDEX IDX_7528E3796CADD19E (actividad_economica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nit (id INT AUTO_INCREMENT NOT NULL, documento4_id INT NOT NULL, UNIQUE INDEX UNIQ_5E5F5AF3C19898DD (documento4_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nup (id INT AUTO_INCREMENT NOT NULL, documento5_id INT NOT NULL, UNIQUE INDEX UNIQ_BF45C3B77924FFB8 (documento5_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pasaporte (id INT AUTO_INCREMENT NOT NULL, documento6_id INT NOT NULL, UNIQUE INDEX UNIQ_AFAAF3966B915056 (documento6_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, primer_nombre VARCHAR(255) NOT NULL, segundo_nombre VARCHAR(255) NOT NULL, tercer_nombre VARCHAR(255) NOT NULL, primer_apellido VARCHAR(255) NOT NULL, apellido_casada VARCHAR(255) NOT NULL, celular VARCHAR(255) NOT NULL, correo VARCHAR(255) NOT NULL, edad INT NOT NULL, fecha_nacimiento VARCHAR(255) NOT NULL, segundo_apellido VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referencia (id INT AUTO_INCREMENT NOT NULL, persona_id INT DEFAULT NULL, asociado_id INT DEFAULT NULL, tipo_referencia VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C01213D8F5F88DB9 (persona_id), INDEX IDX_C01213D8716CD091 (asociado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solicitud (id INT AUTO_INCREMENT NOT NULL, codigo VARCHAR(255) NOT NULL, estado_solicitud TINYINT(1) NOT NULL, fecha_envio DATE NOT NULL, fecha_ingreso DATE NOT NULL, solicitud_firmada VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarjeta_iva (id INT AUTO_INCREMENT NOT NULL, documento1_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_FEF0BA7EF64668EF (documento1_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE titulo (id INT AUTO_INCREMENT NOT NULL, asociado_id INT DEFAULT NULL, profesion VARCHAR(255) NOT NULL, fotocopia VARCHAR(255) NOT NULL, INDEX IDX_17713E5A716CD091 (asociado_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ubicacion_geografica (id INT AUTO_INCREMENT NOT NULL, pais VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, sub_region VARCHAR(255) NOT NULL, latitud VARCHAR(255) NOT NULL, longitud VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pass_temporal VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actividad_economica ADD CONSTRAINT FK_ADF21DE9F64A67D9 FOREIGN KEY (estudio_socio_economico_id) REFERENCES estudio_socio_economico (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C1CB9D6E4 FOREIGN KEY (solicitud_id) REFERENCES solicitud (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1CF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C2ACEE421 FOREIGN KEY (estado_familiar_id) REFERENCES estado_familiar (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1CD0A7BD7 FOREIGN KEY (direccion_id) REFERENCES direccion (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C6CADD19E FOREIGN KEY (actividad_economica_id) REFERENCES actividad_economica (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1CA4B912AF FOREIGN KEY (mandamiento_pago_id) REFERENCES mandamiento_pago (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1CFA207516 FOREIGN KEY (carnet_id) REFERENCES carnet (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C70AE7BF1 FOREIGN KEY (contrato_id) REFERENCES contrato (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1CC24EE1EB FOREIGN KEY (cuenta_aportacion_id) REFERENCES cuenta_aportacion (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1CC1DEF9EC FOREIGN KEY (cuenta_ahorro_id) REFERENCES cuenta_ahorro (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C2438E450 FOREIGN KEY (carnet_minoridad_id) REFERENCES carnet_minoridad (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C964DF955 FOREIGN KEY (pasaporte_id) REFERENCES pasaporte (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C40311C88 FOREIGN KEY (nup_id) REFERENCES nup (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C6A43F15C FOREIGN KEY (nit_id) REFERENCES nit (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C500C2068 FOREIGN KEY (isss_id) REFERENCES isss (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1CCCBB27FB FOREIGN KEY (dui_id) REFERENCES dui (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C9BB934BA FOREIGN KEY (tarjeta_iva_id) REFERENCES tarjeta_iva (id)');
        $this->addSql('ALTER TABLE asociado ADD CONSTRAINT FK_5074CE1C276E70AD FOREIGN KEY (hoja_legal_id) REFERENCES hoja_legal (id)');
        $this->addSql('ALTER TABLE beneficiario ADD CONSTRAINT FK_E8D0B617716CD091 FOREIGN KEY (asociado_id) REFERENCES asociado (id)');
        $this->addSql('ALTER TABLE beneficiario ADD CONSTRAINT FK_E8D0B617F5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE cargo ADD CONSTRAINT FK_3BEE5771A4B912AF FOREIGN KEY (mandamiento_pago_id) REFERENCES mandamiento_pago (id)');
        $this->addSql('ALTER TABLE carnet_minoridad ADD CONSTRAINT FK_B28E6AA8D32D3733 FOREIGN KEY (documento7_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE conyuge ADD CONSTRAINT FK_ABFBD0BFF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE cuenta_ahorro ADD CONSTRAINT FK_14447F489AEFF118 FOREIGN KEY (cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE cuenta_aportacion ADD CONSTRAINT FK_F60DF0BF9AEFF118 FOREIGN KEY (cuenta_id) REFERENCES cuenta (id)');
        $this->addSql('ALTER TABLE direccion ADD CONSTRAINT FK_F384BE95FFC22FF3 FOREIGN KEY (ubicaciongeografica_id) REFERENCES ubicacion_geografica (id)');
        $this->addSql('ALTER TABLE dui ADD CONSTRAINT FK_D6B9EEA1E4F3C701 FOREIGN KEY (documento2_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE estado_familiar ADD CONSTRAINT FK_7BC279B3314923D FOREIGN KEY (conyuge_id) REFERENCES conyuge (id)');
        $this->addSql('ALTER TABLE hoja_legal ADD CONSTRAINT FK_161214CA8B4E2765 FOREIGN KEY (documento8_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE isss ADD CONSTRAINT FK_FCC3BB2F5C4FA064 FOREIGN KEY (documento3_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE negocio ADD CONSTRAINT FK_7528E379D0A7BD7 FOREIGN KEY (direccion_id) REFERENCES direccion (id)');
        $this->addSql('ALTER TABLE negocio ADD CONSTRAINT FK_7528E3796CADD19E FOREIGN KEY (actividad_economica_id) REFERENCES actividad_economica (id)');
        $this->addSql('ALTER TABLE nit ADD CONSTRAINT FK_5E5F5AF3C19898DD FOREIGN KEY (documento4_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE nup ADD CONSTRAINT FK_BF45C3B77924FFB8 FOREIGN KEY (documento5_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE pasaporte ADD CONSTRAINT FK_AFAAF3966B915056 FOREIGN KEY (documento6_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE referencia ADD CONSTRAINT FK_C01213D8F5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('ALTER TABLE referencia ADD CONSTRAINT FK_C01213D8716CD091 FOREIGN KEY (asociado_id) REFERENCES asociado (id)');
        $this->addSql('ALTER TABLE tarjeta_iva ADD CONSTRAINT FK_FEF0BA7EF64668EF FOREIGN KEY (documento1_id) REFERENCES documento (id)');
        $this->addSql('ALTER TABLE titulo ADD CONSTRAINT FK_17713E5A716CD091 FOREIGN KEY (asociado_id) REFERENCES asociado (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actividad_economica DROP FOREIGN KEY FK_ADF21DE9F64A67D9');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C1CB9D6E4');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1CF5F88DB9');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C2ACEE421');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1CD0A7BD7');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C6CADD19E');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1CA4B912AF');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1CFA207516');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C70AE7BF1');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1CC24EE1EB');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1CC1DEF9EC');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C2438E450');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C964DF955');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C40311C88');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C6A43F15C');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C500C2068');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1CCCBB27FB');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C9BB934BA');
        $this->addSql('ALTER TABLE asociado DROP FOREIGN KEY FK_5074CE1C276E70AD');
        $this->addSql('ALTER TABLE beneficiario DROP FOREIGN KEY FK_E8D0B617716CD091');
        $this->addSql('ALTER TABLE beneficiario DROP FOREIGN KEY FK_E8D0B617F5F88DB9');
        $this->addSql('ALTER TABLE cargo DROP FOREIGN KEY FK_3BEE5771A4B912AF');
        $this->addSql('ALTER TABLE carnet_minoridad DROP FOREIGN KEY FK_B28E6AA8D32D3733');
        $this->addSql('ALTER TABLE conyuge DROP FOREIGN KEY FK_ABFBD0BFF5F88DB9');
        $this->addSql('ALTER TABLE cuenta_ahorro DROP FOREIGN KEY FK_14447F489AEFF118');
        $this->addSql('ALTER TABLE cuenta_aportacion DROP FOREIGN KEY FK_F60DF0BF9AEFF118');
        $this->addSql('ALTER TABLE direccion DROP FOREIGN KEY FK_F384BE95FFC22FF3');
        $this->addSql('ALTER TABLE dui DROP FOREIGN KEY FK_D6B9EEA1E4F3C701');
        $this->addSql('ALTER TABLE estado_familiar DROP FOREIGN KEY FK_7BC279B3314923D');
        $this->addSql('ALTER TABLE hoja_legal DROP FOREIGN KEY FK_161214CA8B4E2765');
        $this->addSql('ALTER TABLE isss DROP FOREIGN KEY FK_FCC3BB2F5C4FA064');
        $this->addSql('ALTER TABLE negocio DROP FOREIGN KEY FK_7528E379D0A7BD7');
        $this->addSql('ALTER TABLE negocio DROP FOREIGN KEY FK_7528E3796CADD19E');
        $this->addSql('ALTER TABLE nit DROP FOREIGN KEY FK_5E5F5AF3C19898DD');
        $this->addSql('ALTER TABLE nup DROP FOREIGN KEY FK_BF45C3B77924FFB8');
        $this->addSql('ALTER TABLE pasaporte DROP FOREIGN KEY FK_AFAAF3966B915056');
        $this->addSql('ALTER TABLE referencia DROP FOREIGN KEY FK_C01213D8F5F88DB9');
        $this->addSql('ALTER TABLE referencia DROP FOREIGN KEY FK_C01213D8716CD091');
        $this->addSql('ALTER TABLE tarjeta_iva DROP FOREIGN KEY FK_FEF0BA7EF64668EF');
        $this->addSql('ALTER TABLE titulo DROP FOREIGN KEY FK_17713E5A716CD091');
        $this->addSql('DROP TABLE actividad_economica');
        $this->addSql('DROP TABLE asociado');
        $this->addSql('DROP TABLE beneficiario');
        $this->addSql('DROP TABLE cargo');
        $this->addSql('DROP TABLE carnet');
        $this->addSql('DROP TABLE carnet_minoridad');
        $this->addSql('DROP TABLE contrato');
        $this->addSql('DROP TABLE conyuge');
        $this->addSql('DROP TABLE cuenta');
        $this->addSql('DROP TABLE cuenta_ahorro');
        $this->addSql('DROP TABLE cuenta_aportacion');
        $this->addSql('DROP TABLE direccion');
        $this->addSql('DROP TABLE documento');
        $this->addSql('DROP TABLE dui');
        $this->addSql('DROP TABLE estado_familiar');
        $this->addSql('DROP TABLE estudio_socio_economico');
        $this->addSql('DROP TABLE hoja_legal');
        $this->addSql('DROP TABLE isss');
        $this->addSql('DROP TABLE mandamiento_pago');
        $this->addSql('DROP TABLE negocio');
        $this->addSql('DROP TABLE nit');
        $this->addSql('DROP TABLE nup');
        $this->addSql('DROP TABLE pasaporte');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE referencia');
        $this->addSql('DROP TABLE solicitud');
        $this->addSql('DROP TABLE tarjeta_iva');
        $this->addSql('DROP TABLE titulo');
        $this->addSql('DROP TABLE ubicacion_geografica');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
