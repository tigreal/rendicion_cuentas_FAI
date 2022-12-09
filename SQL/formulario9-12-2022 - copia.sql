USE [master]
GO
/****** Object:  Database [formulario]    Script Date: 09/12/2022 0:42:14 ******/
CREATE DATABASE [formulario]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'formulario', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER2019\MSSQL\DATA\formulario.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'formulario_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER2019\MSSQL\DATA\formulario_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [formulario] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [formulario].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [formulario] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [formulario] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [formulario] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [formulario] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [formulario] SET ARITHABORT OFF 
GO
ALTER DATABASE [formulario] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [formulario] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [formulario] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [formulario] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [formulario] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [formulario] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [formulario] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [formulario] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [formulario] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [formulario] SET  DISABLE_BROKER 
GO
ALTER DATABASE [formulario] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [formulario] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [formulario] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [formulario] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [formulario] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [formulario] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [formulario] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [formulario] SET RECOVERY FULL 
GO
ALTER DATABASE [formulario] SET  MULTI_USER 
GO
ALTER DATABASE [formulario] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [formulario] SET DB_CHAINING OFF 
GO
ALTER DATABASE [formulario] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [formulario] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [formulario] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [formulario] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'formulario', N'ON'
GO
ALTER DATABASE [formulario] SET QUERY_STORE = OFF
GO
USE [formulario]
GO
/****** Object:  Table [dbo].[login]    Script Date: 09/12/2022 0:42:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[login](
	[name] [nvarchar](max) NULL,
	[carnet] [int] NOT NULL,
	[clave] [nvarchar](max) NULL,
 CONSTRAINT [PK_login] PRIMARY KEY CLUSTERED 
(
	[carnet] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[register]    Script Date: 09/12/2022 0:42:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[register](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[email] [varchar](255) NOT NULL,
	[username] [varchar](255) NOT NULL,
	[password] [varchar](255) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[temp_form_datos]    Script Date: 09/12/2022 0:42:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[temp_form_datos](
	[number_form_temp] [int] NULL,
	[fecha] [date] NULL,
	[PS_field] [nvarchar](30) NULL,
	[nombre] [nvarchar](300) NULL,
	[ci] [nvarchar](50) NULL,
	[area] [nvarchar](50) NULL,
	[proyecto] [nvarchar](100) NULL,
	[importe] [decimal](5, 2) NULL,
	[destinoFondos] [nvarchar](100) NULL,
	[fecha_factura] [date] NULL,
	[numero_factura] [nvarchar](300) NULL,
	[detalle_descripcion_factura] [nvarchar](500) NULL,
	[monto_factura] [decimal](5, 2) NULL,
	[total] [decimal](5, 2) NULL,
	[saldo] [decimal](5, 2) NULL,
	[reintegro] [decimal](5, 2) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[temp_number_formulario]    Script Date: 09/12/2022 0:42:15 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[temp_number_formulario](
	[numero_formulario_temp] [int] IDENTITY(1,1) NOT NULL,
	[ps_field] [nvarchar](30) NOT NULL,
	[ci] [nvarchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[numero_formulario_temp] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
USE [master]
GO
ALTER DATABASE [formulario] SET  READ_WRITE 
GO
